<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\FicheFournisseur;
use App\Models\Coordonnee;
use App\Models\Telephone;
use App\Models\CoordonneeTelephone;
use App\Models\Contact;
use App\Models\Licence;
use App\Models\SousCategorieLicence;
use App\Models\BrochureCarte;
use App\Models\ProduitService;
use App\Models\ProduitServiceFicheFournisseur;
use App\Models\ParametreSysteme;
use App\Notifications\WelcomeEmail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;

class FicheFournisseurController extends Controller
{

    public function login(Request $request)
    {
        if ($request->has('numeroEntreprise')) {
            $request->validate([
                'numeroEntreprise' => 'required|string|max:10',
                'motDePasse' => 'required|string|min:7|max:12',
            ]);

            $credentials = [
                'neq' => $request->numeroEntreprise,
                'password' => $request->motDePasse,
            ];
        } elseif ($request->has('adresse_courriel')) {
            $request->validate([
                'adresse_courriel' => 'required|email|max:64',
                'motDePasse' => 'required|string|min:7|max:12',
            ]);

            $credentials = [
                'adresse_courriel' => $request->adresse_courriel,
                'password' => $request->motDePasse,
            ];
        } else {
            return back()->withErrors([
                'login_error' => 'Vous devez fournir soit un numéro d\'entreprise (NEQ) soit une adresse courriel.',
            ]);
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('profil')->with('message', 'Connexion réussie');
        } else {

            Log::error('Échec de connexion', ['credentials' => $credentials]);

            return back()->withErrors([
                'login_error' => 'Ces informations ne correspondent pas à nos enregistrements ou le mot de passe est incorrect.',
            ]);
        }
    }

    public function resume()
    {
        $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
        return view('formulaireInscription/resume', compact('maxFileSize'));
    }

    public function removeInscrit(Request $request)
    {
        $request->session()->forget('inscrit');
        return response()->json(['status' => 'success']);
    }

    public function profil()
    {
        $fournisseur = Auth::user();
        $licence = $fournisseur->licence()->with('sousCategories.categorie')->first();
        $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');

        return view('formulaireInscription/profil_fournisseur', compact('maxFileSize', 'fournisseur', 'licence'));
    }
    public function indexAvecNeq()
    {
        return view('login/login_fournisseur_avec_neq');
    }

    public function indexSansNeq()
    {
        return view('login/login_fournisseur_sans_neq');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Déconnexion réussie');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login/login_fournisseur');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        try {
            DB::beginTransaction();


            $ficheFournisseur = FicheFournisseur::create([
                'neq' => session('identification.numeroEntreprise') ?? null,
                'etat' => 'En attente',
                'nom_entreprise' => session('identification.nomEntreprise'),
                'adresse_courriel' => session('identification.email'),
                'password' => bcrypt(session('identification.password')),
                'details_specifications' => session('produitsServices.details_specifications', null),
                'date_changement_etat' => now(),
            ]);


            $coordonnee = Coordonnee::create([
                'numero_civique' => session('coordonnees.numeroCivique'),
                'rue' => session('coordonnees.rue'),
                'bureau' => session('coordonnees.bureau'),
                'ville' => session('coordonnees.municipalite', session('coordonnees.municipaliteInput')),
                'province' => session('coordonnees.province'),
                'site_internet' => session('coordonnees.siteWeb', null), // Optionnel
                'code_postal' => session('coordonnees.codePostale'),
                'region_administrative' => session('coordonnees.regionAdministrative', null), // Optionnel
                'fiche_fournisseur_id' => $ficheFournisseur->id,
            ]);


            $telephones = session('coordonnees.ligne', []);
            foreach ($telephones as $telephoneData) {

                $numeroNettoye = str_replace('-', '', $telephoneData['numeroTelephone']);

                $telephone = Telephone::create([
                    'numero_telephone' => $numeroNettoye,
                    'poste' => $telephoneData['poste'] ?? null,
                    'type' => $telephoneData['type'] ?? 'Bureau', // Optionnel
                ]);



                CoordonneeTelephone::create([
                    'coordonnee_id' => $coordonnee->id,
                    'telephone_id' => $telephone->id,
                ]);
            }





            $contacts = session('contacts', []);
            foreach ($contacts as $contactData) {

                $numeroNettoyeContacts = str_replace('-', '', $contactData['numeroTelephone']);

                $telephone = Telephone::create([
                    'numero_telephone' => $numeroNettoyeContacts,
                    'poste' => $contactData['poste'] ?? null, // Optionnel
                    'type' => $contactData['type'] ?? 'Bureau',
                ]);


                Contact::create([
                    'prenom' => $contactData['prenom'],
                    'nom' => $contactData['nom'],
                    'fonction' => $contactData['fonction'],
                    'adresse_courriel' => $contactData['email'],
                    'fiche_fournisseur_id' => $ficheFournisseur->id,
                    'telephone_id' => $telephone->id,
                ]);
            }


            $licenceData = session('licences', []);
            if (!empty($licenceData)) {
                $numeroNettoyeRbq = str_replace('-', '', $licenceData['numeroLicence']);

                $licence = Licence::create([
                    'numero_licence_rbq' => $numeroNettoyeRbq,
                    'statut' => $licenceData['statut'],
                    'type_licence' => $licenceData['typeLicence'],
                    'fiche_fournisseur_id' => $ficheFournisseur->id,
                ]);


                $sousCategories = $licenceData['sousCategorie'] ?? [];
                foreach ($sousCategories as $sousCategorieId) {
                    SousCategorieLicence::create([
                        'licence_id' => $licence->id,
                        'sous_categorie_id' => $sousCategorieId,
                    ]);
                }
            }

            $produitsServices = session('produitsServices.produits_services', []);
            foreach ($produitsServices as $produitServiceId) {
                ProduitServiceFicheFournisseur::create([
                    'produit_service_id' => $produitServiceId,
                    'fiche_fournisseur_id' => $ficheFournisseur->id,
                ]);
            }

            $brochures = session('brochures_cartes_affaires', []);
            $publicDir = 'brochures';

            if (!empty($brochures)) {
                foreach ($brochures as $brochure) {
                    $filePath = $brochure['chemin'];
                    $fileName = $brochure['nom'];


                    $newPath = $publicDir . '/' . $fileName;

                    if (Storage::disk('local')->exists($filePath)) {

                        $fileContent = Storage::disk('local')->get($filePath);
                        Storage::disk('public')->put($newPath, $fileContent);


                        Storage::disk('local')->delete($filePath);


                        $typeDeFichier = mime_content_type(storage_path('app/public/' . $newPath));


                        BrochureCarte::create([
                            'nom' => $fileName,
                            'type_de_fichier' => $typeDeFichier,
                            'chemin' => $newPath,
                            'taille' => $brochure['taille'],
                            'fiche_fournisseur_id' => $ficheFournisseur->id,
                        ]);
                    }
                }
            }

            DB::commit();
            $ficheFournisseur->notify(new WelcomeEmail());

            session(['inscrit' => true]);

            return redirect()->route('redirection')->with('success', 'La fiche fournisseur a été créée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();


            \Log::error('Erreur lors de la création de la fiche fournisseur : ' . $e->getMessage());


            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création de la fiche fournisseur : ' . $e->getMessage()]);
        }
    }

    public function redirection()
    {
        if(Auth::check()){
            return redirect()->route('profil');
        }

        // Vérifie si la variable de session 'inscrit' est définie et à true
        if (!session('inscrit', false)) {
            // Redirige vers la page de connexion si la variable de session n'est pas à true
            return redirect()->route('login');
        }

        return view('formulaireInscription/redirection');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
