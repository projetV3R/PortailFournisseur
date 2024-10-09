@extends('layouts.app')

@section('title', 'ProfilFourmisseur')

@section('contenu')

    <div class="p-4 md:p-16">
        <div class="flex flex-col md:flex-row w-full">
            <div class="flex flex-col w-full md:w-1/2">
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Profil Utilisateur</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Vérifiez vos informations personnelles et les
                    détails de votre compte</h1>
            </div>

            <div class="bg-green-100 mt-4 md:mt-0 md:ml-2 w-full md:w-1/2 py-4 px-6 flex items-center">
                <div class="text-green-500">
                    <!-- Icône pour indiquer le statut accepté -->
                    <span class="iconify text-green-500" data-icon="material-symbols:check-circle-outline" data-inline="false"
                        style="font-size: 2rem;"></span>
                </div>
                <div class="ml-4">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl">Statut de la demande : <span
                            class="text-green-600">Acceptée</span></h4>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

            <!-- Première colonne -->
            <div>
                <!-- Cadre 1 : Informations d’authentification -->
                <div class="bg-primary-100 py-8 px-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Informations d’authentification</h4>

                    <!-- Bouton "modifier" ajouté en haut à droite du cadre -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="mt-6">
                        <p class="font-Alumni text-md md:text-lg"><strong>Nom de l'entreprise :</strong>
                            {{ session('email') }}</p>
                    </div>

                    <div class="mt-6">
                        <p class="font-Alumni text-md md:text-lg"><strong>Email :</strong> {{ session('email') }}</p>
                    </div>

                    <div class="mt-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Mot de passe :</strong> ••••••••</p>
                        <!-- Placeholder for security reasons -->
                    </div>

                </div>


                <div class="mt-8 px-4 py-8 bg-primary-100 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Coordonnées</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <p class="font-Alumni md:text-lg"><strong>Numéro Civique:</strong> 123</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Rue:</strong> Rue des Fleurs</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Bureau:</strong> 10A</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Municipalité:</strong> Ville de Test</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Code postal:</strong> H1A 2B3</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Région Administrative:</strong> Région Test</p>
                        </div>

                        <div>
                            <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Coordonnées en ligne</h4>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Site web:</strong> www.example.com</p>
                        </div>
                    </div>

                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline mt-6">Numéros de téléphone</h4>
                    <div class="max-h-48 overflow-y-auto mt-2">
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne 1:</strong> 514-123-4567 - Poste: 101</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne 2:</strong> 514-234-5678 - Poste: 102</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne 3:</strong> 514-345-6789 - Poste: 103</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne 4:</strong> 514-456-7890 - Poste: 104</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne 5:</strong> 514-567-8901 - Poste: 105</p>
                    </div>
                </div>

                <!-- Résumé des documents téléversés -->
                <div class="mt-8 bg-primary-100 p-4 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Documents téléchargés</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="mt-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Nom du fichier :</strong> N/A </p>
                        <p class="font-Alumni text-md md:text-lg"><strong>Taille du fichier :</strong> N/A MB</p>
                        <p class="font-Alumni text-md md:text-lg"><strong>Type de fichier :</strong> N/A</p>
                    </div>

                    <div class="mt-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Statut :</strong> N/A</p>
                    </div>
                </div>

                <div class="bg-primary-100 py-8 px-4 mt-8 relative">
                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Finances</h4>

                    <div class="mt-6 w-full max-w-md">
                        <!-- Résumé des informations fiscales -->
                        <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Informations Fiscales</h5>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro TPS:</strong> {{ old('numeroTPS', 'N/A') }}
                        </p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro TVQ:</strong> {{ old('numeroTVQ', 'N/A') }}
                        </p>

                        <!-- Résumé des conditions de paiement -->
                        <h5 class="font-Alumni font-semibold text-md md:text-lg mt-4 underline">Conditions de Paiement</h5>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Condition de Paiement:</strong>
                            {{ old('conditionDePaiement', 'N/A') }}</p>

                        <!-- Résumé des informations de configuration -->
                        <h5 class="font-Alumni font-semibold text-md md:text-lg mt-4 underline">Configuration</h5>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Devise:</strong> {{ old('devise', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Mode de Communication:</strong>
                            {{ old('modeCommunication', 'N/A') }}</p>
                    </div>
                </div>


            </div>

            <!-- Deuxième colonne : Progression -->
            <div>
                <div class="bg-primary-100 py-8 px-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Informations de l’entreprise</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="mt-6">
                        <p class="font-Alumni text-md md:text-lg"><strong>Numéro d’entreprise du Québec (NEQ) :</strong>
                            {{ session('numeroEntreprise', 'Non renseigné') }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Nom de l’entreprise :</strong>
                            {{ session('nomEntreprise') }}</p>
                    </div>
                </div>

                <div class="bg-primary-100 py-8 px-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div id="produitsServicesResumes"
                        class="max-h-64 mt-8 overflow-y-auto custom-scrollbar grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Exemple simplifié de produit/service ajouté -->
                        <div class="bg-white px-4 py-2 w-full flex items-center">
                            <div class="flex-grow">
                                <h6 class="font-Alumni font-bold text-lg md:text-xl">Services</h6>
                                <p class="font-Alumni md:text-md mt-1">Code UNSPC : 73150000</p>
                                <p class="font-Alumni italic md:text-md">Description : Recherche et développement dans les
                                    pêcheries</p>
                            </div>

                            <!-- Icône de suppression plus petite -->
                            <div
                                class="cursor-pointer flex items-center justify-center text-white bg-tertiary-400 p-2 ml-4 rounded-full">
                                <span class="iconify text-sm hover:text-red-500" data-icon="material-symbols:delete"
                                    data-inline="false"></span>
                            </div>
                        </div>

                        <div class="bg-white px-4 py-2 w-full flex items-center">
                            <div class="flex-grow">
                                <h6 class="font-Alumni font-bold text-lg md:text-xl">Services</h6>
                                <p class="font-Alumni md:text-md mt-1">Code UNSPC : 73150000</p>
                                <p class="font-Alumni italic md:text-md">Description : Recherche et développement dans les
                                    pêcheries</p>
                            </div>

                            <!-- Icône de suppression plus petite -->
                            <div
                                class="cursor-pointer flex items-center justify-center text-white bg-tertiary-400 p-2 ml-4 rounded-full">
                                <span class="iconify text-sm hover:text-red-500" data-icon="material-symbols:delete"
                                    data-inline="false"></span>
                            </div>
                        </div>

                        <div class="bg-white px-4 py-2 w-full flex items-center">
                            <div class="flex-grow">
                                <h6 class="font-Alumni font-bold text-lg md:text-xl">Services</h6>
                                <p class="font-Alumni md:text-md mt-1">Code UNSPC : 73150000</p>
                                <p class="font-Alumni italic md:text-md">Description : Recherche et développement dans les
                                    pêcheries</p>
                            </div>

                            <!-- Icône de suppression plus petite -->
                            <div
                                class="cursor-pointer flex items-center justify-center text-white bg-tertiary-400 p-2 ml-4 rounded-full">
                                <span class="iconify text-sm hover:text-red-500" data-icon="material-symbols:delete"
                                    data-inline="false"></span>
                            </div>
                        </div>

                        <div class="bg-white px-4 py-2 w-full flex items-center">
                            <div class="flex-grow">
                                <h6 class="font-Alumni font-bold text-lg md:text-xl">Services</h6>
                                <p class="font-Alumni md:text-md mt-1">Code UNSPC : 73150000</p>
                                <p class="font-Alumni italic md:text-md">Description : Recherche et développement dans les
                                    pêcheries</p>
                            </div>

                            <!-- Icône de suppression plus petite -->
                            <div
                                class="cursor-pointer flex items-center justify-center text-white bg-tertiary-400 p-2 ml-4 rounded-full">
                                <span class="iconify text-sm hover:text-red-500" data-icon="material-symbols:delete"
                                    data-inline="false"></span>
                            </div>
                        </div>

                        <div class="bg-white px-4 py-2 w-full flex items-center">
                            <div class="flex-grow">
                                <h6 class="font-Alumni font-bold text-lg md:text-xl">Services</h6>
                                <p class="font-Alumni md:text-md mt-1">Code UNSPC : 73150000</p>
                                <p class="font-Alumni italic md:text-md">Description : Recherche et développement dans les
                                    pêcheries</p>
                            </div>

                            <!-- Icône de suppression plus petite -->
                            <div
                                class="cursor-pointer flex items-center justify-center text-white bg-tertiary-400 p-2 ml-4 rounded-full">
                                <span class="iconify text-sm hover:text-red-500" data-icon="material-symbols:delete"
                                    data-inline="false"></span>
                            </div>
                        </div>

                        <div class="bg-white px-4 py-2 w-full flex items-center">
                            <div class="flex-grow">
                                <h6 class="font-Alumni font-bold text-lg md:text-xl">Services</h6>
                                <p class="font-Alumni md:text-md mt-1">Code UNSPC : 73150000</p>
                                <p class="font-Alumni italic md:text-md">Description : Recherche et développement dans les
                                    pêcheries</p>
                            </div>

                            <!-- Icône de suppression plus petite -->
                            <div
                                class="cursor-pointer flex items-center justify-center text-white bg-tertiary-400 p-2 ml-4 rounded-full">
                                <span class="iconify text-sm hover:text-red-500" data-icon="material-symbols:delete"
                                    data-inline="false"></span>
                            </div>
                        </div>

                        <!-- Ajouter d'autres produits/services sélectionnés de la même manière -->
                    </div>

                    <div class="mt-6">
                        <label for="details" class="block font-Alumni text-md md:text-lg mb-2">Détails
                            supplémentaires</label>
                        <textarea disabled id="details" name="details" placeholder="Entrer des détails supplémentaires"
                            class="font-Alumni w-full max-w-md p-2 h-28 focus:outline-none focus:border-blue-500 border border-black"></textarea>

                        @error('details')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Cadre résumé des contacts -->
                <div class="bg-primary-100 py-8 px-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Contacts</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <!-- Section scrollable pour afficher plusieurs contacts -->
                    <div id="contactsContainer"
                        class="max-h-64 overflow-y-auto grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <!-- Exemple de carte de contact -->
                        <div class="bg-white p-4">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <div class="sm:w-1/2 pr-2">
                                    <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Information générale
                                    </h5>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Prénom:</strong> Jean</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Nom:</strong> Dupont</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Fonction:</strong> Manager</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Email:</strong> <span
                                            class="block sm:inline">jean.dupont@example.com</span></p>
                                </div>

                                <div class="sm:w-1/2 lg:pl-2">
                                    <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Coordonnées</h5>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne:</strong> 01234 567 890</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro Tél:</strong> 06 12 34 56 78</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Poste:</strong> Directeur de projet</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-4">
                            <div class="flex flex-col sm:flex-row justify-between">
                                <div class="sm:w-1/2 pr-2">
                                    <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Information générale
                                    </h5>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Prénom:</strong> Marie</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Nom:</strong> Martin</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Fonction:</strong> Développeuse</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Email:</strong> <span
                                            class="block sm:inline">marie.martin@example.com</span></p>
                                </div>

                                <div class="sm:w-1/2 lg:pl-2">
                                    <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Coordonnées</h5>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne:</strong> 01234 567 891</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro Tél:</strong> 06 23 45 67 89</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Poste:</strong> Ingénieure</p>
                                </div>
                            </div>
                        </div>

                        <!-- Ajoutez d'autres contacts de la même manière en suivant le même modèle -->
                    </div>
                </div>

                <div class="bg-primary-100 py-8 px-4 mt-8 relative">
                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Licences</h4>

                    <div class="mt-6 w-full max-w-md">
                        <!-- Résumé des informations fiscales -->
                        <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Informations Fiscales</h5>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro TPS:</strong> {{ old('numeroTPS', 'N/A') }}
                        </p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro TVQ:</strong> {{ old('numeroTVQ', 'N/A') }}
                        </p>

                        <!-- Résumé des conditions de paiement -->
                        <h5 class="font-Alumni font-semibold text-md md:text-lg mt-4 underline">Conditions de Paiement</h5>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Condition de Paiement:</strong>
                            {{ old('conditionDePaiement', 'N/A') }}</p>

                        <!-- Résumé des informations de configuration -->
                        <h5 class="font-Alumni font-semibold text-md md:text-lg mt-4 underline">Configuration</h5>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Devise:</strong> {{ old('devise', 'N/A') }}</p>
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Mode de Communication:</strong>
                            {{ old('modeCommunication', 'N/A') }}</p>
                    </div>

                    <!-- Conteneurs pour les catégories avec défilement -->
                    <div class="mt-6">
                        <h5 class="font-Alumni font-bold text-md md:text-lg underline">Catégories de Licences</h5>
                        <div class="overflow-auto max-h-48">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                                <!-- Carte pour chaque catégorie -->
                                <div class="bg-white shadow-md rounded p-4">
                                    <h6 class="font-Alumni font-semibold text-md md:text-lg underline">Catégorie 1</h6>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Détails:</strong>
                                        {{ old('detailsCategorie1', 'N/A') }}</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Sous-catégorie:</strong>
                                        {{ old('sousCategorie1', 'N/A') }}</p>
                                </div>
                                <div class="bg-white shadow-md rounded p-4">
                                    <h6 class="font-Alumni font-semibold text-md md:text-lg underline">Catégorie 2</h6>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Détails:</strong>
                                        {{ old('detailsCategorie2', 'N/A') }}</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Sous-catégorie:</strong>
                                        {{ old('sousCategorie2', 'N/A') }}</p>
                                </div>
                                <!-- Ajoute d'autres cartes pour les catégories -->
                                <div class="bg-white shadow-md rounded p-4">
                                    <h6 class="font-Alumni font-semibold text-md md:text-lg underline">Catégorie 3</h6>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Détails:</strong>
                                        {{ old('detailsCategorie3', 'N/A') }}</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Sous-catégorie:</strong>
                                        {{ old('sousCategorie3', 'N/A') }}</p>
                                </div>
                                <div class="bg-white shadow-md rounded p-4">
                                    <h6 class="font-Alumni font-semibold text-md md:text-lg underline">Catégorie 4</h6>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Détails:</strong>
                                        {{ old('detailsCategorie4', 'N/A') }}</p>
                                    <p class="mt-2 font-Alumni md:text-lg"><strong>Sous-catégorie:</strong>
                                        {{ old('sousCategorie4', 'N/A') }}</p>
                                </div>
                                <!-- Ajoute d'autres cartes selon les besoins -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
