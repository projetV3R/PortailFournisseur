@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'Finances')

@section('contenu')
    <form action="{{ route('storeFinances') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16">
            <!-- Première colonne -->
            <div>
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">FINANCES</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Parce que les bons comptes font les bons amis
                </h1>

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Taxes et paiement</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">
                        <div class="w-full">
                            <label for="numeroTPS" class="block font-Alumni text-md md:text-lg mb-2">
                                Numero TPS
                            </label>
                            <input type="text" id="numeroTPS" name="numeroTPS" placeholder="5366HDJD828"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('numeroTPS')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="numeroTVQ" class="block font-Alumni text-md md:text-lg mb-2">
                            Numero TVQ
                        </label>

                        <input type="text" id="numeroTVQ" name="numeroTVQ" placeholder="5366HDJD828"
                            class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                        @error('numeroTVQ')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="conditionDePaiement" class="block font-Alumni text-md md:text-lg mb-2">
                            Condition de paiement
                        </label>
                        <!-- Select -->
                        <select name="conditionDePaiement" id="conditionDePaiement" class="font-Alumni form-select w-full">
                            <option value="" class="font-Alumni">Condition de paiement</option>
                            <option>Rouyn-Noranda</option>
                            <option>Val-d'Or</option>
                            <option>Amos</option>
                            <option>La Sarre</option>
                        </select>

                        @error('conditionDePaiement')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                        <!-- End Select -->
                    </div>

                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous
                </h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Configuration</h4>

                    <div class="mt-6 w-full md:max-w-full flex gap-4 columns-2 ">

                        <!-- Conteneur du segment -->
                        <div class="w-1/2">
                            <label for="devise" class="block font-Alumni text-md md:text-lg mb-2">
                                Devise
                            </label>
                            <!-- Select -->
                            <select name="devise" id="devise" class="font-Alumni form-select w-full">
                                <option value="" class="font-Alumni">Choisir une devise</option>
                                <option>CAD</option>
                                <option>USD</option>
                            </select>

                            <!-- End Select -->

                            @error('devise')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Conteneur du segment -->
                        <div class="w-1/2">
                            <label for="modeCommunication" class="block font-Alumni text-md md:text-lg mb-2">
                                Mode de Communication
                            </label>
                            <!-- Select -->
                            <select name="modeCommunication" id="modeCommunication" class="form-select font-Alumni">
                                <option value="" class="font-Alumni">Mode de communication</option>
                                <option>Rouyn-Noranda</option>
                                <option>Val-d'Or</option>
                                <option>Amos</option>
                                <option>La Sarre</option>
                            </select>

                            <!-- End Select -->

                            @error('modeCommunication')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="mt-4 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Suivant</h1>
                </button>

            </div>
        </div>
    </form>
@endsection
