@extends('layouts.app')

@section('title', 'ProfilFourmisseur')

@section('contenu')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4 md:p-16">

        <!-- Première colonne -->
        <div>
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Profil Utilisateur</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Vérifiez vos informations personnelles et les
                détails de votre compte</h1>

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
                    <p class="font-Alumni text-md md:text-lg"><strong>Email :</strong> {{ session('email') }}</p>
                </div>
                <div class="mt-4">
                    <p class="font-Alumni text-md md:text-lg"><strong>Mot de passe :</strong> ••••••••</p>
                    <!-- Placeholder for security reasons -->
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

                <div id="produitsServicesResumes">
                    <!-- Exemple de produit/service ajouté -->
                    <div class="bg-white px-4 py-2 mt-8 w-full max-w-md mr-8 flex">
                        <div>
                            <h6 class="font-Alumni font-bold md:text-3xl">Services</h6>
                            <h4 class="font-Alumni md:text-xl mt-2">Recherche et développement (R et D)</h4>
                            <h1 class="font-Alumni italic md:text-lg">Services d'expérimentation ou de recherche sur les
                                pêcheries</h1>
                        </div>

                        <!-- Bouton de suppression déjà existant -->
                        <div
                            class="cursor-pointer w-1/6 flex items-center justify-center text-white bg-tertiary-400 p-2 m-8 rounded-full">
                            <span class="iconify size-8 lg:size-10 hover:text-red-500" data-icon="material-symbols:delete"
                                data-inline="false"></span>
                        </div>
                    </div>

                    <!-- Ajouter d'autres produits/services sélectionnés de la même manière -->
                </div>

                <div class="mt-6">
                    <label for="details" class="block font-Alumni text-md md:text-lg mb-2">Détails supplémentaires</label>
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
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro TPS:</strong> {{ old('numeroTPS', 'N/A') }}</p>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro TVQ:</strong> {{ old('numeroTVQ', 'N/A') }}</p>

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

            <div class="bg-green-100 py-4 px-6 mb-4 mt-8 flex items-center">
                <div class="text-green-500">
                    <!-- Icône pour indiquer le statut accepté -->
                    <span class="iconify text-green-500" data-icon="material-symbols:check-circle-outline"
                        data-inline="false" style="font-size: 2rem;"></span>
                </div>
                <div class="ml-4">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl">Statut de la demande : <span
                            class="text-green-600">Acceptée</span></h4>
                </div>
            </div>

            <div class="bg-primary-100 py-8 px-4 mt-5 relative">
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


            <div class="mt-8 px-4 py-8 bg-primary-100 relative">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Coordonnées</h4>

                <!-- Bouton "modifier" en haut à droite -->
                <div class="absolute right-4 top-4">
                    <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                        <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                            style="font-size: 1.5rem;"></span>
                    </button>
                </div>

                <p class="mt-4 font-Alumni md:text-lg"><strong>Numéro Civique:</strong> {{ old('numeroCivique', 'N/A') }}
                </p>
                <p class="mt-2 font-Alumni md:text-lg"><strong>Rue:</strong> {{ old('rue', 'N/A') }}</p>
                <p class="mt-2 font-Alumni md:text-lg"><strong>Bureau:</strong> {{ old('bureau', 'N/A') }}</p>
                <p class="mt-2 font-Alumni md:text-lg"><strong>Municipalité:</strong> {{ old('municipalite', 'N/A') }}</p>
                <p class="mt-2 font-Alumni md:text-lg"><strong>Code postal:</strong> {{ old('codePostale', 'N/A') }}</p>
                <p class="mt-2 font-Alumni md:text-lg"><strong>Région Administrative:</strong>
                    {{ old('regionAdministrative', 'N/A') }}</p>

                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline mt-6">Coordonnées en ligne</h4>
                <p class="mt-2 font-Alumni md:text-lg"><strong>Site web:</strong> {{ old('siteWeb', 'N/A') }}</p>

                <div>
                    @foreach (old('numeroTelephone', []) as $index => $numeroTelephone)
                        <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne {{ $index + 1 }}:</strong>
                            {{ old('ligne.' . $index, 'N/A') }} -
                            {{ $numeroTelephone }} (Poste: {{ old('poste.' . $index, 'N/A') }})
                        </p>
                    @endforeach
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

                <!-- Boucle pour afficher plusieurs contacts -->
                <div class="mt-6 w-full max-w-md">
                    <!-- Résumé des informations générales -->
                    <h5 class="font-Alumni font-semibold text-md md:text-lg underline">Information générale</h5>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Prénom:</strong> N/A</p>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Nom:</strong> N/A</p>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Fonction:</strong> N/A</p>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Email:</strong> N/A</p>

                    <!-- Résumé du numéro de téléphone -->
                    <h5 class="font-Alumni font-semibold text-md md:text-xl mt-4 underline">Coordonnées</h5>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Ligne:</strong> N/A</p>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Numéro Téléphone:</strong> N/A</p>
                    <p class="mt-2 font-Alumni md:text-lg"><strong>Poste:</strong> N/A</p>
                </div>
            </div>

        </div>
    </div>

@endsection
