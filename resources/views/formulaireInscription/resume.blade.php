@extends('layouts.app')

@section('title', 'Resume')

@section('contenu')

@vite('resources/css/page_resume.css')


<div class="p-4 md:p-16 ">
    <div class="flex flex-col md:flex-row w-full justify-between items-center ">
        <div class="flex flex-col">
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Resume des informations</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Verifier vos informations avant de les soumettre</h1>
        </div>


     
        <div class="flex items-center gap-4 mt-4 md:mt-0 ">
            @auth <!-- Select pour revenir à une page précédente uniquement pour personne connecté qui vient pour modifier  -->
            <select class="form-select bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="pageSelect">
                <option value="" disabled selected>Revenir à...</option>
                <option value="identification">Identification</option>
                <option value="coordonnees">Coordonnées</option>
                <option value="contacts">Contacts</option>
                <option value="produits_services">Produits et Services</option>
                <option value="licences">Licences et Autorisations</option>
            </select>
            @endauth
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Erreur :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
            <form id="information" action="{{ route('FicheFournisseursStore') }}" method="POST">
                @csrf
                <button type="button" onclick="confirmInformation()" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                    Valider les informations
                </button>
            </form>
            
        </div>
    </div>
    <div class="tab absolute rounded dark:bg-gray-900 text-black dark:text-white">
        <button class="tablinks font-Alumni" onclick="information(event, '1')">Information</button>
        <button class="tablinks font-Alumni" onclick="information(event, '2')">Documentation</button>
    </div>

<div class="flex flex-col gap-4 w-full h-full">

    <div id="1" class="tabcontent flex-1 rounded shadow-lg">
        <div class="flex flex-col md:flex-row gap-4 mt-4 flex-1">
            <!-- Informations d’authentification -->
            <div class="bg-primary-100 py-8 px-4 mt-10 relative flex-1 dark:bg-gray-500 text-black dark:text-white">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Informations d’authentification</h4>
                <div class="absolute right-4 top-4">
                    <a href="{{ route('CreateIdentification') }}" class="text-tertiary-400 hover:text-tertiary-300">
                        <span class="iconify" data-icon="material-symbols:edit" style="font-size: 1.5rem;"></span>
                    </a>
                </div>
                <div class="mt-6">
                    <p class="font-Alumni text-md md:text-lg"><strong>Nom de l'entreprise :</strong> {{ session('identification.nomEntreprise') }}</p>
                </div>
                <div class="mt-6">
                    <p class="font-Alumni text-md md:text-lg"><strong>Email :</strong> {{ session('identification.email') }}</p>
                </div>
                <div class="mt-4">
                    <p class="font-Alumni text-md md:text-lg"><strong>Mot de passe :</strong> ••••••••</p>
                </div>
                <div class="mt-4">
                    <p class="font-Alumni text-md md:text-lg"><strong>Numero d'entreprise (NEQ) :</strong> {{ session('identification.numeroEntreprise') }}</p>
                </div>
            </div>

            <div class="mt-10 px-4 py-8 bg-primary-100 relative flex md:flex-[1.5] dark:bg-gray-500 text-black dark:text-white">
                <!-- Colonne 1 -->
                <div class="flex-1 md:flex-[2]">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Coordonnées</h4>
                    <div class="absolute right-4 top-4">
                        <a href="{{ route('CreateCoordonnees') }}" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" style="font-size: 1.5rem;"></span>
                        </a>
                    </div>
                    <div>
                        <p class="font-Alumni md:text-lg"><strong>Numéro Civique :</strong> {{ session('coordonnees.numeroCivique', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Rue :</strong> {{ session('coordonnees.rue', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Bureau :</strong> {{ session('coordonnees.bureau', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Municipalité :</strong> {{ session('coordonnees.municipalite', session('coordonnees.municipaliteInput', 'N/A')) }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Code postal :</strong> {{ session('coordonnees.codePostale', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Région Administrative :</strong> {{ session('coordonnees.regionAdministrative', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Province :</strong> {{ session('coordonnees.province', 'N/A') }}</p>
                    </div>
                </div>

                <!-- Colonne 2 -->
                <div class="flex-1 md:flex-[1.5]">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Site web :</h4>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Site web :</strong> {{ session('coordonnees.siteWeb', 'N/A') }}</p>

                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline mt-6">Numéros de téléphone</h4>
                    <div class="max-h-64 overflow-y-auto mt-2">
                        @if(session('coordonnees.ligne'))
                            <div class="flex flex-col gap-4 max-h-64 overflow-y-auto">
                                @foreach (session('coordonnees.ligne') as $index => $ligne)
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne {{ $loop->iteration }} :</strong> [{{ $ligne['type'] }}]-{{ $ligne['numeroTelephone'] }}
                                        @if($ligne['poste'])
                                            - Poste : {{ $ligne['poste'] }}
                                        @endif
                                    </p>
                                @endforeach
                            </div>
                        @else
                            <p class="font-Alumni text-md md:text-lg">Aucune ligne de téléphone enregistrée.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Liste des contacts -->
            <div class="bg-primary-100 px-4 py-8 mt-10 relative flex-1 dark:bg-gray-500 text-black dark:text-white">
                <div class="flex items-center gap-2">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Contacts</h4>
                    @if(session('contacts'))
                        <span class="font-normal text-lg"> ({{ count(session('contacts')) }})</span>
                    @endif
                </div>
                <div class="absolute right-4 top-4">
                    <a href="{{ route('createContacts') }}" class="text-tertiary-400 hover:text-tertiary-300">
                        <span class="iconify" data-icon="material-symbols:edit" style="font-size: 1.5rem;"></span>
                    </a>
                </div>
                <div class="flex flex-col gap-4 mt-4 max-h-64 overflow-y-auto">
                    @if(session('contacts'))
                        @foreach (session('contacts') as $index => $contact)
                            <h5 class="font-Alumni font-semibold text-md md:text-lg">Contact {{ $loop->iteration }}</h5>
                            <div class="border-b pb-4">
                                <p class="font-Alumni text-md md:text-lg"><strong>Prénom :</strong> {{ $contact['prenom'] }}</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Nom :</strong> {{ $contact['nom'] }}</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Fonction :</strong> {{ $contact['fonction'] }}</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Email :</strong> {{ $contact['email'] }}</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Ligne :</strong> {{ $contact['type'] }}</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Numéro de téléphone :</strong> {{ $contact['numeroTelephone'] }}</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Poste :</strong> {{ $contact['poste'] ?? 'N/A' }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="font-Alumni text-md md:text-lg">Aucun contact n'est disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="2" class="tabcontent flex-1 rounded shadow-lg">
        <div class="flex flex-col md:flex-row gap-4 mt-4 flex-1">
            <!-- Documents téléchargés -->
            <div class="bg-primary-100 px-4 py-8 mt-10 relative flex-1 dark:bg-gray-500 text-black dark:text-white">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Documents téléchargés</h4>
                <div class="absolute right-4 top-4">
                    <a href="{{ route('createBrochuresCartesAffaires') }}" class="text-tertiary-400 hover:text-tertiary-300">
                        <span class="iconify" data-icon="material-symbols:edit" style="font-size: 1.5rem;"></span>
                    </a>
                </div>
                <div class="mt-4 max-h-64 overflow-y-auto" id="brochuresContainer"></div>
                <div class="mt-4 shadow-lg rounded-lg p-1 bg-white text-black">
                    <p class="font-Alumni text-md md:text-lg"><strong>Taille totale des fichiers :</strong> <span id="totalSize">0</span> MB</p>
                    <p class="font-Alumni text-md md:text-lg"><strong>Nombre de fichiers :</strong> <span id="fileCount">0</span></p>
                    <p class="font-Alumni text-md md:text-lg"><strong>Taille maximale autorisée :</strong> {{ $maxFileSize }} MB</p>
                </div>
            </div>

            <!-- Produits et Services -->
            <div class="bg-primary-100 px-4 py-8 mt-10 relative flex-1 dark:bg-gray-500 text-black dark:text-white">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et Services</h4>
                <div class="absolute right-4 top-4">
                    <a href="{{ route('createProduitsServices') }}" class="text-tertiary-400 hover:text-tertiary-300">
                        <span class="iconify" data-icon="material-symbols:edit" style="font-size: 1.5rem;"></span>
                    </a>
                </div>
                <div class="flex flex-col gap-4 mt-4 max-h-64 overflow-y-auto" id="produitsServicesContainer">
                    <p class="font-Alumni text-md md:text-lg">Chargement des produits et services...</p>
                </div>
                <div class="mt-4">
                    <p class="font-Alumni text-md md:text-lg"><strong>Nombre de produits et services :</strong> <span id="produitServiceCount">0</span></p>
                </div>
            </div>

            <!-- Licences et Autorisations -->
            <div class="bg-primary-100 px-4 py-8 mt-10 relative flex-1 dark:bg-gray-500 text-black dark:text-white">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Licences et Autorisations</h4>
                <div class="absolute right-4 top-4">
                    <a href="{{ route('createLicences') }}" class="text-tertiary-400 hover:text-tertiary-300">
                        <span class="iconify" data-icon="material-symbols:edit" style="font-size: 1.5rem;"></span>
                    </a>
                </div>
                <div class="mt-4 shadow-lg rounded-lg p-1 bg-white text-black">
                    <p class="font-Alumni text-md md:text-lg"><strong>Numéro de licence RBQ :</strong> {{ session('licences.numeroLicence', 'N/A') }}</p>
                    <p class="font-Alumni text-md md:text-lg"><strong>Statut :</strong> {{ session('licences.statut', 'N/A') }}</p>
                    <p class="font-Alumni text-md md:text-lg"><strong>Type de licence :</strong> {{ session('licences.typeLicence', 'N/A') }}</p>
                    <p class="font-Alumni text-md md:text-lg"><strong>Nombre de sous-catégories :</strong> <span id="sousCategorieCount">0</span></p>
                </div>
                <div class="flex flex-col gap-4 mt-4 max-h-64 overflow-y-auto" id="licencesContainer">
                    <p class="font-Alumni text-md md:text-lg">Chargement des licences et autorisations...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function information(evt, numPage) 
    {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(numPage).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".tablinks").click();
    });
</script>

<script>
    function confirmInformation() {
        Swal.fire({
            title: "Êtes-vous sûr ?",
            text: "Vous ne pourrez pas revenir en arrière !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, valider !"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('information').submit();
            }
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
   
        let brochures = @json(session('brochures_cartes_affaires', []));
        let totalSize = 0;
        let brochuresContainer = document.getElementById('brochuresContainer');

        if (brochures.length > 0) {
            brochuresContainer.innerHTML = '';
            brochures.forEach(function(brochure) {
                let brochureHtml = `
                    <div class="border-b pb-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Nom du fichier :</strong> ${brochure.nom}</p>
                        <p class="font-Alumni text-md md:text-lg"><strong>Taille :</strong> ${(brochure.taille / (1024 * 1024)).toFixed(2)} MB</p>
                        <p class="font-Alumni text-md md:text-lg"><strong>Date d'ajout :</strong> ${new Date(brochure.timestamp * 1000).toLocaleString()}</p>
                    </div>`;
                brochuresContainer.insertAdjacentHTML('beforeend', brochureHtml);
                totalSize += brochure.taille;
            });
            document.getElementById('fileCount').textContent = brochures.length;
        } else {
            brochuresContainer.innerHTML = '<p class="font-Alumni text-md md:text-lg">Aucun fichier téléchargé.</p>';
        }

        document.getElementById('totalSize').textContent = (totalSize / (1024 * 1024)).toFixed(2);

        // Produits et Services
        let produitsServicesContainer = document.getElementById('produitsServicesContainer');
        let produitsServicesIds = @json(session('produitsServices.produits_services', []));

        if (produitsServicesIds.length > 0) {
            axios.get('/produits-services/multiple', {
                params: { ids: produitsServicesIds }
            })
            .then(function(response) {
                produitsServicesContainer.innerHTML = '';
                response.data.forEach(function(produit) {
                    let produitHtml = `
                        <div class="border-b pb-4">
                            <p class="font-Alumni text-md md:text-lg"><strong>Nature du Produit/Service :</strong> ${produit.nature}</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Description :</strong> ${produit.description}</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Code Catégorie :</strong> ${produit.code_categorie}</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Code UNSPSC :</strong> ${produit.code_unspsc}</p>
                        </div>`;
                    produitsServicesContainer.insertAdjacentHTML('beforeend', produitHtml);
                });
                document.getElementById('produitServiceCount').textContent = produitsServicesIds.length;
            })
            .catch(function(error) {
                produitsServicesContainer.innerHTML = '<p class="font-Alumni text-md md:text-lg text-red-500">Erreur lors du chargement des produits et services.</p>';
            });
        } else {
            produitsServicesContainer.innerHTML = '<p class="font-Alumni text-md md:text-lg">Aucun produit ou service sélectionné.</p>';
        }

        // Licences et Autorisations
        let licencesContainer = document.getElementById('licencesContainer');
        let sousCategorieIds = @json(session('licences.sousCategorie', []));

        if (sousCategorieIds.length > 0) {
            axios.get('/sous-categories/affichage/multiple', {
                params: { ids: sousCategorieIds }
            })
            .then(function(response) {
                licencesContainer.innerHTML = '';
                response.data.forEach(function(sousCategorie) {
                    let sousCategorieHtml = `
                        <div class="border-b pb-4">
                            <p class="font-Alumni text-md md:text-lg"><strong>Code Sous-catégorie :</strong> ${sousCategorie.code_sous_categorie}</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Description :</strong> ${sousCategorie.travaux_permis}</p>
                        </div>`;
                    licencesContainer.insertAdjacentHTML('beforeend', sousCategorieHtml);
                });
                document.getElementById('sousCategorieCount').textContent = sousCategorieIds.length;
            })
            .catch(function(error) {
                licencesContainer.innerHTML = '<p class="font-Alumni text-md md:text-lg text-red-500">Erreur lors du chargement des licences et autorisations.</p>';
            });
        } else {
            licencesContainer.innerHTML = '<p class="font-Alumni text-md md:text-lg">Aucune licence ou autorisation sélectionnée.</p>';
        }
    });
</script>

@endsection
