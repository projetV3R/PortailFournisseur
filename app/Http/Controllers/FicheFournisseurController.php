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
use App\Http\Requests\IdentificationRequest;
use App\Http\Requests\ProduitServiceRequest;
use App\Http\Requests\CoordonneeRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LicenceRequest;
use App\Http\Requests\FinanceRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Historique;
use App\Models\ProduitsServices;
use App\Models\SousCategorie;
use App\Notifications\NotificationModification;
use App\Notifications\NotificationNouvelleFicheVille;

class FicheFournisseurController extends Controller
{

    public function login(Request $request)
    {
        if ($request->has('numeroEntreprise')) {
            $request->validate([
                'numeroEntreprise' => 'required|string|max:10',
                'motDePasse' => 'required|string|min:7|max:12',],[
                    'numeroEntreprise.required' => 'Le numéro d\'entreprise (NEQ) est obligatoire.',
                    'numeroEntreprise.string' => 'Le numéro d\'entreprise (NEQ) doit être une chaîne de caractères valide.',
                    'numeroEntreprise.max' => 'Le numéro d\'entreprise (NEQ) ne doit pas dépasser 10 caractères.',
                    'motDePasse.required' => 'Le mot de passe est obligatoire.',
                    'motDePasse.string' => 'Le mot de passe doit être une chaîne de caractères valide.',
                    'motDePasse.min' => 'Le mot de passe doit comporter au moins 7 caractères.',
                    'motDePasse.max' => 'Le mot de passe ne doit pas dépasser 12 caractères.',

            ]);

            $credentials = [
                'neq' => $request->numeroEntreprise,
                'password' => $request->motDePasse,
            ];
        } elseif ($request->has('adresse_courriel')) {
            $request->validate([
                'adresse_courriel' => 'required|email|max:64',
                'motDePasse' => 'required|string|min:7|max:12',],[
                    'adresse_courriel.required' => 'L\'adresse courriel est obligatoire.',
                    'adresse_courriel.email' => 'L\'adresse courriel doit être une adresse email valide.',
                    'adresse_courriel.max' => 'L\'adresse courriel ne doit pas dépasser 64 caractères.',
                    'motDePasse.required' => 'Le mot de passe est obligatoire.',
                    'motDePasse.string' => 'Le mot de passe doit être une chaîne de caractères valide.',
                    'motDePasse.min' => 'Le mot de passe doit comporter au moins 7 caractères.',
                    'motDePasse.max' => 'Le mot de passe ne doit pas dépasser 12 caractères.',  ]);

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
            $fournisseur = Auth::user();
                 if ($fournisseur && $fournisseur->etat === 'accepter' && !$fournisseur->finance()->exists()) {
                     return view('formulaireInscription/Finances', compact('fournisseur'));
                 }else{
                     return redirect()->route('profil')->with('message', 'Connexion réussie');
                 }
        } else {
          
            Log::error('Échec de connexion', ['credentials' => $credentials]);

            return back()->withErrors([
                'login_error' => 'Ces informations ne correspondent pas à nos enregistrements ou le mot de passe est incorrect.',
            ]);
        }
    }
   
    public function resume()
    {
        // Vérifie que l'utilisateur n'est pas connecté et que toutes les variables de session requises sont présentes
        if (!auth()->check() && session()->has(['contacts', 'coordonnees', 'identification', 'licences', 'produitsServices'])) {
            $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
            return view('formulaireInscription/resume', compact('maxFileSize'));
        }
    
        // Redirige vers une autre page ou affiche une erreur si les conditions ne sont pas remplies
        return redirect()->back();
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
        
        return view('formulaireInscription/profil_fournisseur' , compact('maxFileSize','fournisseur', 'licence'));
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

        return redirect()->route('login')->with('success', 'Déconnexion réussie');
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
    if (!auth()->check() && session()->has(['contacts', 'coordonnees', 'identification', 'licences', 'produitsServices'])) {
    try {
        DB::beginTransaction();


        $ficheFournisseur = FicheFournisseur::create([
            'neq' => session('identification.numeroEntreprise')?? null,
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
                'poste' => $telephoneData['poste']?? null,
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
                'poste' => $contactData['poste'] ?? null,// Optionnel
                'type' => $contactData['type'] ?? 'Bureau',
            ]);

    
            Contact::create([
                'prenom' => $contactData['prenom'],
                'nom' => $contactData['nom'],
                'fonction' => $contactData['fonction'] ?? null,
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
          //A modifier pour $file->getClientOriginalExtension()  a tester
                     
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
        $data = [
            'nomEntreprise' => $ficheFournisseur->nom_entreprise,
            'emailEntreprise' => $ficheFournisseur->adresse_courriel,
            'dateInscription' => now()->format('Y-m-d H:i:s'),
            'auteur' => $ficheFournisseur->adresse_courriel,
        ];
        
        $ficheFournisseur->notify(new WelcomeEmail());
        $ficheFournisseur->notify(new NotificationNouvelleFicheVille($data));
        session()->flush();
        session(['inscrit' => true]);

        return redirect()->route('redirection')->with('success', 'La fiche fournisseur a été créée avec succès.');

    } catch (\Exception $e) {
        DB::rollBack();


        \Log::error('Erreur lors de la création de la fiche fournisseur : ' . $e->getMessage());


        return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors de la création de la fiche fournisseur : ' . $e->getMessage()]);
        }
    }
    return redirect()->route('login');
}

public function updateProfile(IdentificationRequest $request)
{
    $fournisseur = Auth::user();

    // Mettre à jour les données du fournisseur
    $fournisseur->adresse_courriel = $request->input('email');

    if ($request->filled('password')) {
        $fournisseur->password = bcrypt(($request->input('password')));
    }

    $fournisseur->nom_entreprise = $request->input('nomEntreprise');

    $fournisseur->save();

    // Rediriger avec un message de succès
    return redirect()->back()
        ->with('success', 'Votre profil a été mis à jour avec succès.');
}

public function updateProduit(ProduitServiceRequest $request)
{
    $fournisseur = Auth::user();

 
    $oldDetailsSpecifications = $fournisseur->details_specifications;


    $newDetailsSpecifications = $request->input('details_specifications');

  
    $fournisseur->details_specifications = $newDetailsSpecifications;
    $fournisseur->save();

  
    $oldProductIds = $fournisseur->produitsServices()->pluck('produits_services.id')->toArray();

   
    $newProductIds = $request->input('produits_services', []);


    $fournisseur->produitsServices()->sync($newProductIds);


    $addedProductIds = array_diff($newProductIds, $oldProductIds);
    $removedProductIds = array_diff($oldProductIds, $newProductIds);

    $historiqueRemove = []; 
    $historiqueDetails = []; 

    if ($oldDetailsSpecifications !== $newDetailsSpecifications) {
        if (!empty($oldDetailsSpecifications)) {
            $historiqueRemove[] = "details et specifications: {$oldDetailsSpecifications}";
        }
        if (!empty($newDetailsSpecifications)) {
            $historiqueDetails[] = "details et specifications: {$newDetailsSpecifications}";
        }
    }

   
    if (!empty($removedProductIds)) {
        $removedProducts = ProduitsServices::whereIn('id', $removedProductIds)->get();
        foreach ($removedProducts as $product) {
            $historiqueRemove[] = "-{$product->code_unspsc} {$product->description}";
        }
    }

 
    if (!empty($addedProductIds)) {
        $addedProducts = ProduitsServices::whereIn('id', $addedProductIds)->get();
        foreach ($addedProducts as $product) {
            $historiqueDetails[] = "+{$product->code_unspsc} {$product->description}";
        }
    }

 
    if (!empty($historiqueDetails) || !empty($historiqueRemove)) {
        Historique::create([
            'table_name' => 'Produits&Services',
            'author' => $fournisseur->adresse_courriel,
            'action' => 'Modifier',
            'old_values' => !empty($historiqueRemove) ? implode(", ", $historiqueRemove) : null,
            'new_values' => !empty($historiqueDetails) ? implode(", ", $historiqueDetails) : null,
            'fiche_fournisseur_id' => $fournisseur->id,
        ]);
        $sectionModifiee = 'Produits et services';
        $data = [
            'sectionModifiee' => $sectionModifiee,
            'nomEntreprise' => $fournisseur->nom_entreprise,
            'emailEntreprise' => $fournisseur->adresse_courriel,
            'dateModification' => now()->format('d-m-Y H:i:s'),
            'auteur' => $fournisseur->adresse_courriel,
        ];
        $fournisseur->notify(new NotificationModification($data));
    }

    return redirect()->back()->with('success', 'Vos produits et services ont été mis à jour avec succès.');
}



public function updateCoordonnee(CoordonneeRequest $request)
{
    $fournisseur = Auth::user();

    $coordonnee = $fournisseur->coordonnee;

    $oldCoordonneeAttributes = $coordonnee->getOriginal();

    $existingTelephoneIds = $coordonnee->telephones()->pluck('telephones.id')->toArray();

    $submittedTelephoneIds = [];
    $updatedTelephones = [];
    $deletedTelephones = [];


    $coordonnee->numero_civique = $request->input('numeroCivique');
    $coordonnee->rue = $request->input('rue');
    $coordonnee->bureau = $request->input('bureau');
    $coordonnee->code_postal = $request->input('codePostale');
    $coordonnee->province = $request->input('province');
    $coordonnee->region_administrative = $request->input('regionAdministrative');
    $coordonnee->site_internet = $request->input('siteWeb');
    $coordonnee->ville = $request->input('municipalite') ?? $request->input('municipaliteInput');
    $coordonnee->save();

    $lignes = $request->input('ligne', []);
    foreach ($lignes as $ligne) {
        $numeroNettoye = str_replace('-', '', $ligne['numeroTelephone']);

        if (isset($ligne['id']) && !empty($ligne['id'])) {
   
            $telephone = Telephone::findOrFail($ligne['id']);
            $oldTelephoneAttributes = $telephone->getOriginal();

            $telephone->numero_telephone = $numeroNettoye;
            $telephone->poste = $ligne['poste'] ?? null;
            $telephone->type = $ligne['type'] ?? 'Bureau';
            $telephone->save();

            $submittedTelephoneIds[] = $telephone->id;

   
            if ($oldTelephoneAttributes['numero_telephone'] != $telephone->numero_telephone ||
                $oldTelephoneAttributes['poste'] != $telephone->poste ||
                $oldTelephoneAttributes['type'] != $telephone->type) {
                $updatedTelephones[] = [
                    'old' => $oldTelephoneAttributes,
                    'new' => $telephone->toArray(),
                ];
            }
        } else {
          
            $telephone = Telephone::create([
                'numero_telephone' => $numeroNettoye,
                'poste' => $ligne['poste'] ?? null,
                'type' => $ligne['type'] ?? 'Bureau',
            ]);
            $coordonnee->telephones()->attach($telephone->id);
            $submittedTelephoneIds[] = $telephone->id;

            $updatedTelephones[] = [
                'old' => null,
                'new' => $telephone->toArray(),
            ];
        }
    }

    $telephonesToDetach = array_diff($existingTelephoneIds, $submittedTelephoneIds);

    if (!empty($telephonesToDetach)) {
        $deletedTelephones = Telephone::whereIn('id', $telephonesToDetach)->get()->toArray();

        $coordonnee->telephones()->detach($telephonesToDetach);
        Telephone::whereIn('id', $telephonesToDetach)->delete();
    }

    $oldValues = [];
    $newValues = [];

    $attributesToCheck = [
        'numero_civique',
        'rue',
        'bureau',
        'code_postal',
        'province',
        'region_administrative',
        'site_internet',
        'ville'
    ];

    foreach ($attributesToCheck as $attribute) {
        $oldValue = $oldCoordonneeAttributes[$attribute] ?? null;
        $newValue = $coordonnee->$attribute;

        if ($oldValue != $newValue) {
            $oldValues[] = "-{$attribute}: {$oldValue}";
            $newValues[] = "+{$attribute}: {$newValue}";
        }
    }

 
    foreach ($updatedTelephones as $updatedTelephone) {
        $oldTel = $updatedTelephone['old'];
        $newTel = $updatedTelephone['new'];

        if ($oldTel === null) {
       
            $newValues[] = "+telephone: {$newTel['numero_telephone']}, poste: {$newTel['poste']}, type: {$newTel['type']}";
        } else {
            $changes = [];

            if ($oldTel['numero_telephone'] != $newTel['numero_telephone']) {
                $changes[] = "numero telephone de {$oldTel['numero_telephone']} à {$newTel['numero_telephone']}";
            }
            if ($oldTel['poste'] != $newTel['poste']) {
                $changes[] = "poste de {$oldTel['poste']} à {$newTel['poste']}";
            }
            if ($oldTel['type'] != $newTel['type']) {
                $changes[] = "type de {$oldTel['type']} à {$newTel['type']}";
            }

            if (!empty($changes)) {
             
                $newValues[] = "+Modif telephone: " . implode(", ", $changes);
            }
        }
    }

    foreach ($deletedTelephones as $deletedTelephone) {
        $oldValues[] = "-telephone: {$deletedTelephone['numero_telephone']}, poste: {$deletedTelephone['poste']}, type: {$deletedTelephone['type']}";
    }

    if (!empty($oldValues) || !empty($newValues)) {
        Historique::create([
            'table_name' => 'Coordonnee', 
            'author' => $fournisseur->adresse_courriel,
            'action' => 'Modifier',
            'old_values' => !empty($oldValues) ? implode("; ", $oldValues) : null,
            'new_values' => !empty($newValues) ? implode("; ", $newValues) : null,
            'fiche_fournisseur_id' => $fournisseur->id,
        ]);
        $sectionModifiee = 'Coordonnées';
        $data = [
            'sectionModifiee' => $sectionModifiee,
            'nomEntreprise' => $fournisseur->nom_entreprise,
            'emailEntreprise' => $fournisseur->adresse_courriel,
            'dateModification' => now()->format('d-m-Y H:i:s'),
            'auteur' => $fournisseur->adresse_courriel,
        ];
        $fournisseur->notify(new NotificationModification($data));
    }

    return redirect()->back()->with('success', 'Vos coordonnées ont été mises à jour avec succès.');
}


    public function updateDoc(Request $request)
    {
        $fournisseur = Auth::user();
    
        $maxFileSize = ParametreSysteme::where('cle', 'taille_fichier')->value('valeur_numerique');
        $totalSize = 0;
    
      
        $validator = Validator::make($request->all(), [
            'fichiers.*' => 'mimes:doc,docx,pdf,jpg,jpeg,xls,xlsx'
        ], [
            'fichiers.*.mimes' => 'Chaque fichier doit être de type : doc, docx, pdf, jpg, jpeg, xls ou xlsx.'
        ]);
    
        if ($validator->fails()) {
            // Stocker les erreurs de validation dans la session 
            session()->put('errorsFichiers', $validator->errors());
          return  redirect()->back();
           
        }
    
      
        $existingFiles = $fournisseur->brochuresCarte;
        $fileIdsToDelete = $request->input('fichiers_a_supprimer', []);
    
        foreach ($existingFiles as $file) {
            
            if (!in_array($file->id, $fileIdsToDelete)) {
                $totalSize += $file->taille / (1024 * 1024); // Convertir la taille en Mo
            }
        }
    
    
        if ($request->hasFile('fichiers')) {
            foreach ($request->file('fichiers') as $file) {
                $totalSize += $file->getSize() / (1024 * 1024); // Convertir la taille en Mo
            }
        }
    
   
        if ($totalSize > $maxFileSize) {
            // Stocker le message d'erreur dans la session
            session()->put('errorsFichiers',"La taille totale des fichiers, incluant les fichiers existants, dépasse la limite de {$maxFileSize} Mo.");
            return  redirect()->back();
        }

        $existingFiles = $fournisseur->brochuresCarte;
        $fileIdsToDelete = $request->input('fichiers_a_supprimer', []);
    
        $historiqueRemove = []; 
        $historiqueAdd = [];   
    
     
        foreach ($fileIdsToDelete as $fileId) {
            $fileToDelete = $existingFiles->find($fileId);
            if ($fileToDelete) {
            
                if (Storage::disk('public')->exists($fileToDelete->chemin)) {
                    Storage::disk('public')->delete($fileToDelete->chemin);
                }
              
                $historiqueRemove[] = "-{$fileToDelete->nom}";
             
                $fileToDelete->delete();
            }
        }
    
       
        if ($request->hasFile('fichiers')) {
            foreach ($request->file('fichiers') as $file) {
                $path = $file->store('brochures', 'public');
                $brochure = $fournisseur->brochuresCarte()->create([
                    'nom' => $file->getClientOriginalName(),
                    'chemin' => $path,
                    'taille' => $file->getSize(),
                    'type_de_fichier' => $file->getClientOriginalExtension(),
                ]);
    
                
                $historiqueAdd[] = "+{$brochure->nom}";
            }
        }
    
    
        if (!empty($historiqueAdd) || !empty($historiqueRemove)) {
            $oldValues = !empty($historiqueRemove) ? implode(", ", $historiqueRemove) : null;
            $newValues = !empty($historiqueAdd) ? implode(", ", $historiqueAdd) : null;
    
            Historique::create([
                'table_name' => 'BrochuresCarte',
                'author' => $fournisseur->adresse_courriel,
                'action' => 'Modifier',
                'old_values' => $oldValues,
                'new_values' => $newValues,
                'fiche_fournisseur_id' => $fournisseur->id,
            ]);
            $sectionModifiee = 'Brochures et carte d\affaires';
            $data = [
                'sectionModifiee' => $sectionModifiee,
                'nomEntreprise' => $fournisseur->nom_entreprise,
                'emailEntreprise' => $fournisseur->adresse_courriel,
                'dateModification' => now()->format('d-m-Y H:i:s'),
                'auteur' => $fournisseur->adresse_courriel,
            ];
            $fournisseur->notify(new NotificationModification($data));
        }
    
        return redirect()->back()->with('success', 'Vos brochures & cartes d\'affaires ont été mises à jour avec succès.');
    }
    
    
public function updateLicence(LicenceRequest $request)
{
    $fournisseur = Auth::user();

   
    $licence = $fournisseur->licence()->firstOrNew();


    $oldLicenceAttributes = $licence->exists ? $licence->getOriginal() : [];

 
    $oldSousCategorieIds = $licence->sousCategoriess()->pluck('sous_categorie_id')->toArray();

 
    $numeroNettoyeRbq = str_replace('-', '', $request->input('numeroLicence'));
    $licence->numero_licence_rbq = $numeroNettoyeRbq;
    $licence->statut = $request->input('statut');
    $licence->type_licence = $request->input('typeLicence');
    $licence->fiche_fournisseur_id = $fournisseur->id; 


    $licence->save();


    $newSousCategorieIds = $request->input('sousCategorie', []);


    $licence->sousCategoriess()->sync($newSousCategorieIds);


    $addedSousCategorieIds = array_diff($newSousCategorieIds, $oldSousCategorieIds);
    $removedSousCategorieIds = array_diff($oldSousCategorieIds, $newSousCategorieIds);


    $oldValues = [];
    $newValues = [];

    $attributesToCheck = ['numero_licence_rbq', 'statut', 'type_licence'];

    foreach ($attributesToCheck as $attribute) {
        $oldValue = $oldLicenceAttributes[$attribute] ?? null;
        $newValue = $licence->$attribute;

        if ($oldValue != $newValue) {
            $oldValues[] = "-{$attribute}: {$oldValue}";
            $newValues[] = "+{$attribute}: {$newValue}";
        }
    }

    if (!empty($addedSousCategorieIds)) {
        $addedSousCategories = SousCategorie::whereIn('id', $addedSousCategorieIds)->get();
        foreach ($addedSousCategories as $sousCategorie) {
            $newValues[] = "+{$sousCategorie->code_sous_categorie}";
        }
    }


    if (!empty($removedSousCategorieIds)) {
        $removedSousCategories = SousCategorie::whereIn('id', $removedSousCategorieIds)->get();
        foreach ($removedSousCategories as $sousCategorie) {
            $oldValues[] = "-{$sousCategorie->code_sous_categorie}";
        }
    }


    if (!empty($oldValues) || !empty($newValues)) {
        Historique::create([
            'table_name' => 'Licence',
            'author' => $fournisseur->adresse_courriel,
            'action' => 'Modifier',
            'old_values' => !empty($oldValues) ? implode(", ", $oldValues) : null,
            'new_values' => !empty($newValues) ? implode(", ", $newValues) : null,
            'fiche_fournisseur_id' => $fournisseur->id,
        ]);
        $sectionModifiee = 'Licence et sous-catégories';
        $data = [
            'sectionModifiee' => $sectionModifiee,
            'nomEntreprise' => $fournisseur->nom_entreprise,
            'emailEntreprise' => $fournisseur->adresse_courriel,
            'dateModification' => now()->format('d-m-Y H:i:s'),
            'auteur' => $fournisseur->adresse_courriel,
        ];
        $fournisseur->notify(new NotificationModification($data));
    }

    return redirect()->back()->with('success', 'La licence a été mise à jour avec succès.');
}

    public function updateFinance(FinanceRequest $request)
{
    $fournisseur = Auth::user();

    // Vérifie si le fournisseur est connecté, avec le statut "accepter" et une fiche finance existante
    if ($fournisseur && $fournisseur->etat === 'accepter' && $fournisseur->finance) {
        $fournisseur->finance->update([
            'numero_tps' => $request->input('numeroTPS'),
            'numero_tvq' => $request->input('numeroTVQ'),
            'condition_paiement' => $request->input('conditionDePaiement'),
            'devise' => $request->input('devise'),
            'mode_communication' => $request->input('modeCommunication'),
        ]);

        return redirect()->route('profil')->with('success', 'Informations financières mises à jour avec succès.');
    }

    return redirect()->back()->withErrors('Erreur lors de la mise à jour des informations financières.');
}
  

public function updateContact(ContactRequest $request)
{
    $fournisseur = Auth::user();

    $existingContactIds = $fournisseur->contacts()->pluck('id')->toArray();
    $submittedContactIds = array_filter(array_column($request->input('contacts', []), 'id'));

    $contactsToDelete = array_diff($existingContactIds, $submittedContactIds);

    $oldValues = [];
    $newValues = [];

    
    foreach ($contactsToDelete as $contactId) {
        $contact = Contact::find($contactId);
        if ($contact) {
            $telephone = $contact->telephone;

            $oldValues[] = "-Contact: {$contact->prenom} {$contact->nom}, Fonction: {$contact->fonction}, Email: {$contact->adresse_courriel}, Téléphone: {$telephone->numero_telephone}, Poste: {$telephone->poste}, Type: {$telephone->type}";

           
            $contact->delete();
            if ($telephone) {
                $telephone->delete();
            }
        }
    }

  
    foreach ($request->input('contacts') as $contactData) {
        $numeroNettoye = str_replace('-', '', $contactData['numeroTelephone']);

       
        if (!empty($contactData['telephone_id'])) {
            $telephone = Telephone::findOrFail($contactData['telephone_id']);
        } else {
            $telephone = new Telephone();
        }

       
        $originalTelephoneAttributes = $telephone->getOriginal();

      
        $telephone->numero_telephone = $numeroNettoye;
        $telephone->poste = $contactData['poste'];
        $telephone->type = $contactData['type'];

   
        $telephoneChanged = $telephone->isDirty();

  
        if ($telephoneChanged) {
            $telephone->save();
        }

   
        if (!empty($contactData['id'])) {
            $contact = Contact::findOrFail($contactData['id']);
        } else {
            $contact = new Contact();
        }

   
        $originalContactAttributes = $contact->getOriginal();

   
        $contact->prenom = $contactData['prenom'];
        $contact->nom = $contactData['nom'];
        $contact->fonction = $contactData['fonction'];
        $contact->adresse_courriel = $contactData['email'];
        $contact->fiche_fournisseur_id = $fournisseur->id;
        $contact->telephone_id = $telephone->id;

   
        $contactChanged = $contact->isDirty();

   
        if ($contactChanged || !$contact->exists) {
            $contact->save();
        }

     
        if ($contact->wasRecentlyCreated) {
          
            $newValues[] = "+Contact: {$contact->prenom} {$contact->nom}, Fonction: {$contact->fonction}, Email: {$contact->adresse_courriel}, Téléphone: {$telephone->numero_telephone}, Poste: {$telephone->poste}, Type: {$telephone->type}";
        } elseif ($contactChanged || $telephoneChanged) {
      
            $oldContactInfo = "-Contact: {$originalContactAttributes['prenom']} {$originalContactAttributes['nom']}, Fonction: {$originalContactAttributes['fonction']}, Email: {$originalContactAttributes['adresse_courriel']}, Téléphone: {$originalTelephoneAttributes['numero_telephone']}, Poste: {$originalTelephoneAttributes['poste']}, Type: {$originalTelephoneAttributes['type']}";

            $newContactInfo = "+Contact: {$contact->prenom} {$contact->nom}, Fonction: {$contact->fonction}, Email: {$contact->adresse_courriel}, Téléphone: {$telephone->numero_telephone}, Poste: {$telephone->poste}, Type: {$telephone->type}";

            $oldValues[] = $oldContactInfo;
            $newValues[] = $newContactInfo;
        }
      
    }

    if (!empty($oldValues) || !empty($newValues)) {
        Historique::create([
            'table_name' => 'Contacts',
            'author' => $fournisseur->adresse_courriel,
            'action' => 'Modifier',
            'old_values' => !empty($oldValues) ? implode("; ", $oldValues) : null,
            'new_values' => !empty($newValues) ? implode("; ", $newValues) : null,
            'fiche_fournisseur_id' => $fournisseur->id,
        ]);

   
        $sectionModifiee = 'Contacts';
        $data = [
            'sectionModifiee' => $sectionModifiee,
            'nomEntreprise' => $fournisseur->nom_entreprise,
            'emailEntreprise' => $fournisseur->adresse_courriel,
            'dateModification' => now()->format('d-m-Y H:i:s'),
            'auteur' => $fournisseur->adresse_courriel,
        ];
        $fournisseur->notify(new NotificationModification($data));
    }

    return redirect()->route('profil')->with('success', 'Informations de contact mises à jour avec succès.');
}

public function desactivationFiche()
{
    $fournisseur = Auth::user();

    if ($fournisseur->etat == 'accepter') {
        $historiqueRemove = [];
    

        
        $fournisseur->etat = 'desactiver';
        $fournisseur->save();

     
        $brochures = $fournisseur->brochuresCarte;
        foreach ($brochures as $file) {
            if ($file && Storage::disk('public')->exists($file->chemin)) {
                Storage::disk('public')->delete($file->chemin);
            }
            $historiqueRemove[] = "-{$file->nom}";
            $file->delete();
        }

    
        $historiqueRemove = implode(', ', $historiqueRemove);

     
        Historique::create([
            'table_name' => 'Identification et statut',
            'author' => $fournisseur->adresse_courriel,
            'action' => 'Désactivée',
            'old_values' => "-état : Accepter, {$historiqueRemove}",
            'new_values' => '+état : Desactiver',
            'fiche_fournisseur_id' => $fournisseur->id,
        ]);

        return response()->json(['success' => true, 'message' => 'Votre fiche fournisseur a été désactivée avec succès.']);
    }

}


    
    public function reactivationFiche()
    {
        $fournisseur = Auth::user();
        if ($fournisseur->etat=='desactiver'){
            

            $fournisseur->etat='accepter'; 
            $fournisseur->save();
      
            Historique::create([
                'table_name' => 'Identification et statut',
                'author' => $fournisseur->adresse_courriel,
                'action' => 'Acceptée',
                'old_values' => "-état : Desactiver ",
                'new_values' => '+état : Accepter',
                'fiche_fournisseur_id' => $fournisseur->id,
            ]);
            return response()->json(['success' => true, 'message' => 'Votre fiche fournisseur a été réactivée avec succès.']);
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
    public function deleteLicence()
{
    $fournisseur = Auth::user();
    $licence = $fournisseur->licence()->first();

    if ($licence) {
    
        $licence->sousCategoriess()->detach();

      
        $licence->delete();

        Historique::create([
            'table_name' => 'Licence',
            'author' => $fournisseur->adresse_courriel,
            'action' => 'Modifier',
            'old_values' => "-Licence: {$licence->numero_licence_rbq}, Statut: {$licence->statut}, Type: {$licence->type_licence}",
            'new_values' => "+Licence: supprimer",
            'fiche_fournisseur_id' => $fournisseur->id,
        ]);
        $sectionModifiee = 'Licence et sous-catégories';
        $data = [
            'sectionModifiee' => $sectionModifiee,
            'nomEntreprise' => $fournisseur->nom_entreprise,
            'emailEntreprise' => $fournisseur->adresse_courriel,
            'dateModification' => now()->format('d-m-Y H:i:s'),
            'auteur' => $fournisseur->adresse_courriel,
        ];
        $fournisseur->notify(new NotificationModification($data));

        return response()->json(['success' => true, 'message' => 'La licence et ses sous-catégories ont été supprimées avec succès.']);
    }

    return response()->json(['success' => false, 'message' => 'Aucune licence à supprimer.'], 404);
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
