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
class FicheFournisseurController extends Controller
{

    public function login(Request $request)
    {
        if ($request->has('numeroEntreprise')) {
            $request->validate([
                'numeroEntreprise' => 'required|string|max:255|size:10|regex:/^(11|22|33|88)[4-9]\d{7}$/',
                'motDePasse' => 'required|string|min:7|max:12|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{7,12}$/',
            ]);

            $credentials = [
                'neq' => $request->numeroEntreprise,
                'password' => $request->motDePasse,
            ];
        } elseif ($request->has('adresse_courriel')) {
            $request->validate([
                'adresse_courriel' => 'required|email|max:64',
                'motDePasse' => 'required|string|min:7|max:12|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{7,12}$/',
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
            return redirect()->route('CreateIdentification')->with('message', 'Connexion réussie');
        } else {
          
            Log::error('Échec de connexion', ['credentials' => $credentials]);

            return back()->withErrors([
                'login_error' => 'Ces informations ne correspondent pas à nos enregistrements ou le mot de passe est incorrect.',
            ]);
        }
    }

    public function profil()
    { 
        $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
        return view('formulaireInscription/profil_fournisseur' , compact('maxFileSize'));
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

        // 1. Créer la fiche fournisseur
        $ficheFournisseur = FicheFournisseur::create([
            'neq' => session('identification.numeroEntreprise'),
            'etat' => 'En attente',
            'nom_entreprise' => session('identification.nomEntreprise'),
            'adresse_courriel' => session('identification.email'),
            'password' => bcrypt(session('identification.password')),
            'details_specifications' => session('produitsServices.details_specifications', null),
            'date_changement_etat' => now(),
        ]);

        // 2. Créer la coordonnée associée
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
        Log::info('Coordonnée créée avec succès', ['coordonnee_id' => $coordonnee->id]);
        // 3. Créer les numéros de téléphone associés
        $telephones = session('coordonnees.ligne', []);
        foreach ($telephones as $telephoneData) {
            $telephone = Telephone::create([
                'numero_telephone' => $telephoneData['numeroTelephone'],
                'ligne' => $telephoneData['poste']?? null,
                'poste' => $telephoneData['type'] ?? null, // Optionnel
            ]);

            // Lier la coordonnée et le numéro de téléphone
            Log::info('Création de CoordonneeTelephone', [
                'coordonnee_id' => $coordonnee->id,
                'telephone_id' => $telephone->id,
            ]);
            CoordonneeTelephone::create([
                'coordonnee_id' => $coordonnee->id,
                'telephone_id' => $telephone->id,
            ]);
        }

      
        

        // 5. Créer les contacts associés
        $contacts = session('contacts', []);
        foreach ($contacts as $contactData) {
            // Créer le numéro de téléphone du contact
            $telephone = Telephone::create([
                'numero_telephone' => $contactData['numeroTelephone'],
                'ligne' => $contactData['poste'] ?? null,// Optionnel
                'poste' => $contactData['ligne'] ?? null, // Optionnel
            ]);

            // Créer le contact lié au fournisseur
            Contact::create([
                'prenom' => $contactData['prenom'],
                'nom' => $contactData['nom'],
                'fonction' => $contactData['fonction'],
                'adresse_courriel' => $contactData['email'],
                'fiche_fournisseur_id' => $ficheFournisseur->id,
                'telephone_id' => $telephone->id,
            ]);
        }

        // 6. Créer une seule licence associée
        $licenceData = session('licences', []);
        if (!empty($licenceData)) {
            $licence = Licence::create([
                'numero_licence_rbq' => $licenceData['numeroLicence'],
                'statut' => $licenceData['statut'],
                'type_licence' => $licenceData['typeLicence'],
                'fiche_fournisseur_id' => $ficheFournisseur->id,
            ]);

            // Créer les sous-catégories associées à la licence
            $sousCategories = $licenceData['sousCategorie'] ?? [];
            foreach ($sousCategories as $sousCategorieId) {
                SousCategorieLicence::create([
                    'licence_id' => $licence->id,
                    'sous_categorie_id' => $sousCategorieId,
                ]);
            }
        }

        // 7. Créer les produits et services associés
        $produitsServices = session('produitsServices.produits_services', []);
        foreach ($produitsServices as $produitServiceId) {
            ProduitServiceFicheFournisseur::create([
                'produit_service_id' => $produitServiceId,
                'fiche_fournisseur_id' => $ficheFournisseur->id,
            ]);
        }   
          // 4. Déplacer les fichiers de brochures/cartes vers le répertoire public
          $brochures = session('brochures_cartes_affaires', []);
          $publicDir = 'brochures'; // Dossier public
  
          if (!empty($brochures)) {
              foreach ($brochures as $brochure) {
                  $filePath = $brochure['chemin'];
                  $fileName = $brochure['nom'];
          
                  // Construire le nouveau chemin relatif au répertoire public
                  $newPath = $publicDir . '/' . $fileName;
          
                  if (Storage::disk('local')->exists($filePath)) {
                      // Lire le contenu du fichier et le déplacer dans le répertoire public
                      $fileContent = Storage::disk('local')->get($filePath);
                      Storage::disk('public')->put($newPath, $fileContent);
          
                      // Supprimer le fichier source après le déplacement
                      Storage::disk('local')->delete($filePath);
          
                      // Détecter le type de fichier automatiquement
                      $typeDeFichier = mime_content_type(storage_path('app/public/' . $newPath));
          
                      // Créer l'entrée dans la table brochures_cartes
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
        Auth::loginUsingId($ficheFournisseur->id);
        return redirect()->route('profil')->with('success', 'La fiche fournisseur a été créée avec succès.');

    } catch (\Exception $e) {
        DB::rollBack();

        // Log the error for debugging
        \Log::error('Erreur lors de la création de la fiche fournisseur : ' . $e->getMessage());

        // Retourner les erreurs à la vue
        return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création de la fiche fournisseur : ' . $e->getMessage()]);
    }
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
