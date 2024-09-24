@extends('layouts.app')

@section('title', 'Identification')

@section('contenu')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
        <!-- Première colonne -->
        <div>
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Merci de vous identifier !</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous</h1>

            <div class="bg-primary-100 py-8 px-4 mt-8">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Informations d’authentification</h4>

                <div class="mt-6">
                    <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                        Adresse courriel
                    </label>
                    <input type="email" id="email" name="email" placeholder="Entrer votre email"
                        class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">
                </div>

                <div class="mt-4">
                    <label for="motDePasse" class="block font-Alumni text-md md:text-lg mb-2">
                        Choisir un mot de passe
                    </label>
                    <input type="password" id="motDePasse" name="motDePasse" placeholder="Entrer votre mot de passe"
                        class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">
                </div>

                <div class="mt-4">
                    <label for="verifierMotDePasse" class="block font-Alumni text-md md:text-lg mb-2">
                        Ressaisir votre mot de passe
                    </label>
                    <input type="password" id="verifierMotDePasse" name="verifierMotDePasse"
                        placeholder="Ressaisir votre mot de passe"
                        class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">
                </div>
            </div>
        </div>

        <!-- Deuxième colonne -->
        <div>
            <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
            <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous</h1>

            <div class="bg-secondary-100 py-8 px-4 mt-8">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Identification</h4>

                <div class="mt-6">
                    <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                        Numéro d’entreprise du Québec (NEQ)
                    </label>
                    <input type="text" id="numeroEntreprise" name="numeroEntreprise"
                        placeholder="Entrer votre numéro d’entreprise du Québec"
                        class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">
                </div>

                <div class="mt-6">
                    <label for="nomEntreprise" class="block font-Alumni text-md md:text-lg mb-2">
                        Nom de l’entreprise
                    </label>
                    <input type="text" id="nomEntreprise" name="nomEntreprise"
                        placeholder="Entrer le nom de votre entreprise"
                        class="font-Alumni w-full max-w-md p-2 focus:outline-none focus:border-blue-500 border border-black">
                </div>

                <button type="button" class="mt-9 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>
            </div>
        </div>
    </div>
@endsection
