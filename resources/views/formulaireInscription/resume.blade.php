@extends('layouts.app')

@section('title', 'Resume')

@section('contenu')

    <div class="p-4 md:p-16">
        <div class="flex flex-col md:flex-row w-full">
            <div class="flex flex-col w-full md:w-1/2">
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Resume des informations</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Verifier vos informations avant de les
                    soumettre</h1>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-4">

            <div class="flex-1">
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
                            {{ session('nomEntreprise') }}</p>
                    </div>

                    <div class="mt-6">
                        <p class="font-Alumni text-md md:text-lg"><strong>Email :</strong> {{ session('email') }}</p>
                    </div>

                    <div class="mt-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Mot de passe :</strong> ••••••••</p>
                    </div>

                    <div class="mt-4">
                        <p class="font-Alumni text-md md:text-lg"><strong>Numero d'entrepreise (NEQ) :</strong> 1123323454
                        </p>
                    </div>

                </div>

                <!-- Coordonnées -->
                <div class="mt-8 px-4 py-8 bg-primary-100 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Coordonnées</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 mt-4">
                        <div class="flex-1">
                            <p class="font-Alumni md:text-lg"><strong>Numéro Civique:</strong> 123</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Rue:</strong> Rue des Fleurs</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Bureau:</strong> 10A</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Municipalité:</strong> Ville de Test</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Code postal:</strong> H1A 2B3</p>
                            <p class="mt-2 font-Alumni md:text-lg"><strong>Région Administrative:</strong> Région Test</p>
                        </div>

                        <div class="flex-1">
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

                <!-- Documents téléchargés -->
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


            </div>

            <!-- Deuxième colonne -->
            <div class="flex-1">
                <!-- Liste des contacts -->
                <div class="bg-primary-100 p-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Contacts</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="flex flex-col gap-4 mt-4">
                        <!-- Exemple de contact -->
                        <div>
                            <p class="font-Alumni text-md md:text-lg"><strong>Nom:</strong> Contact Test</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Email:</strong> contact@example.com</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Téléphone:</strong> 514-123-4567</p>
                        </div>

                        <!-- Autres contacts -->
                        <!-- Ajouter d'autres contacts si nécessaire -->
                    </div>


                </div>

                <!-- Cadre pour Produits et Services -->
                <div class="bg-primary-100 p-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et Services</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="flex flex-col gap-4 mt-4">
                        <!-- Exemple de produit/service -->
                        <div class="border-b pb-4">
                            <p class="font-Alumni text-md md:text-lg"><strong>Nom du Produit/Service:</strong> Produit Test
                            </p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Description:</strong> Description du
                                produit/service.</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Description Detaille:</strong> test test </p>
                        </div>

                        <!-- Autres produits/services -->
                        <div class="border-b pb-4">
                            <p class="font-Alumni text-md md:text-lg"><strong>Nom du Produit/Service:</strong> Autre
                                Produit</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Description:</strong> Description d'un autre
                                produit/service.</p>
                            <p class="font-Alumni text-md md:text-lg"><strong>Description Detaille:</strong>test test test
                            </p>
                        </div>
                        <!-- Ajouter d'autres produits/services si nécessaire -->
                    </div>
                </div>

                <!-- Cadre pour Licences et Autorisations -->
                <div class="bg-primary-100 p-4 mt-8 relative">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Licences et Autorisations</h4>

                    <!-- Bouton "modifier" en haut à droite -->
                    <div class="absolute right-4 top-4">
                        <button type="button" class="text-tertiary-400 hover:text-tertiary-300">
                            <span class="iconify" data-icon="material-symbols:edit" data-inline="false"
                                style="font-size: 1.5rem;"></span>
                        </button>
                    </div>

                    <div class="flex flex-col gap-4 mt-4">
                        <!-- Catégorie 1 -->
                        <div class="border-b pb-4">
                            <h5 class="font-Alumni font-semibold text-md md:text-lg"><strong>Catégorie : Licences de
                                    Conduite</strong></h5>
                            <div class="ml-4">
                                <p class="font-Alumni text-md md:text-lg"><strong>Sous-catégorie 1 :</strong> 001 - Permis
                                    de Conduire</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Sous-catégorie 2 :</strong> 002 - Permis
                                    de Moto</p>
                            </div>
                        </div>

                        <!-- Catégorie 2 -->
                        <div class="border-b pb-4">
                            <h5 class="font-Alumni font-semibold text-md md:text-lg"><strong>Catégorie : Licences
                                    Professionnelles</strong></h5>
                            <div class="ml-4">
                                <p class="font-Alumni text-md md:text-lg"><strong>Sous-catégorie 1 :</strong> 001 - Licence
                                    d'Ingénieur</p>
                                <p class="font-Alumni text-md md:text-lg"><strong>Sous-catégorie 2 :</strong> 002 - Licence
                                    Médicale</p>
                            </div>
                        </div>

                        <!-- Ajouter d'autres catégories avec leurs sous-catégories si nécessaire -->
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
