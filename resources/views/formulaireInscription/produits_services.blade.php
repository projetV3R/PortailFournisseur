@vite(['resources/css/app.css', 'resources/js/app.js'])

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

                <div class="mt-6 w-full max-w-md">
                    <label for="segment" class="block font-Alumni text-md md:text-lg mb-2">
                        Segment
                    </label>
                    <!-- Select -->
                    <select multiple=""
                        data-hs-select='{
"placeholder": "Choisir un segment",
"toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
"toggleClasses": "font-Alumni hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-black text-start text-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500",
"dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-black overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
"optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-Alumni",
"optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
"extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
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

                <div class="mt-4 w-full max-w-md">
                    <label for="motDePasse" class="block font-Alumni text-md md:text-lg mb-2">
                        Famille
                    </label>
                    <!-- Select -->
                    <select multiple=""
                        data-hs-select='{
"placeholder": "Choisir une famille",
"toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
"toggleClasses": "font-Alumni hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-black text-start text-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500",
"dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-black overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
"optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-Alumni",
"optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
"extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
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

                <div class="mt-4 w-full max-w-md">
                    <label for="verifierMotDePasse" class="block font-Alumni text-md md:text-lg mb-2">
                        Classe
                    </label>
                    <!-- Select -->
                    <select multiple=""
                        data-hs-select='{
                "placeholder": "Choisir une famille",
                "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                "toggleClasses": "font-Alumni hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-black text-start text-sm focus:outline-none focus:border-transparent focus:ring-2 focus:ring-blue-500",
                "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-black overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 focus:outline-none focus:bg-gray-100 font-Alumni",
                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
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
            </div>
        </div>

        <!-- Deuxième colonne -->
        <div>
            <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
            <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous</h1>

            <div class="bg-secondary-100 py-8 px-4 mt-8">
                <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Details et spécifications</h4>

                <div class="mt-6">
                    <label for="details" class="block font-Alumni text-md md:text-lg mb-2">
                        Details
                    </label>
                    <textarea id="details" name="details" placeholder="Entrer des détails supplémentaires"
                        class="font-Alumni w-full max-w-md p-2 h-28 focus:outline-none focus:border-blue-500 border border-black"></textarea>

                </div>

                <button type="button" class="mt-4 w-full text-white bg-secondary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Ajouter</h1>
                </button>

                <button type="button" class="mt-2 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>
            </div>
        </div>
    </div>
@endsection
