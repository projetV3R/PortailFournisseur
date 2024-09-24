@extends('layouts.app')

@section('title', 'ProduitService')

@section('contenu')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
        <!-- Première colonne -->
        <div>
            <h6 class="font-Alumni font-bold text-3xl md:text-5xl">Produits et services</h6>
            <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Parler nous des services que vous offrez</h1>

            <div class="bg-primary-100 py-8 px-4 mt-8">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Produits et services</h4>

                <div class="mt-6">
                    <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                        Adresse courriel
                    </label>
                    <!-- Select -->
                    <select multiple=""
                        data-hs-select='{
    "placeholder": "Select multiple options...",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
  }'
                        class="hidden">
                        <option value="">Choose</option>
                        <option>Name</option>
                        <option>Email address</option>
                        <option>Description</option>
                        <option>User ID</option>
                    </select>
                    <!-- End Select -->
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
