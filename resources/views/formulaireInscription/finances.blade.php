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
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Votre dossier a été accepté dans le bottin ! Merci de compléter vos informations financières pour finaliser le processus. 
                </h1>

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <div class="flex items-center gap-0.5">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl ">Taxes et paiement</h4>
                    <span class="iconify  size-4 md:size-6" data-icon="material-symbols:account-balance-outline"></span>
                </div>
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
                        <select name="conditionDePaiement" id="conditionDePaiement" class="font form-select w-full">
                            <option value="" disabled selected  class="font-Alumni">Condition de paiement</option>
                            <option value="Z001">Payable immédiatement sans déduction</option>
                            <option value="Z155">Payable immédiatement sans déduction,Date de base au 15 du mois suivant</option>
                            <option value="Z152">Dans les 15 jours 2% escpte, dans les 30 jours sans déduction</option>
                            <option value="Z153">Après entrée facture jusqu'au 15 du mois,jusqu'au 15 du mois suivant 2%</option>
                            <option value="Z210">Dans les 10 jours 2% escpte , dans les 30 jours sans déduction</option>
                            <option value="ZT15">Dans les 15 jours sans déduction</option>
                            <option value="ZT30">Dans les 30 jours sans déduction</option>
                            <option value="ZT45">Dans les 45 jours sans déduction</option>
                            <option value="ZT60">Dans les 60 jours sans déduction</option>
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
                    <div class="flex items-center">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl ">Options de facturation</h4>
                    <span class="iconify  size-4 md:size-6" data-icon="material-symbols:attach-money"></span>
                </div>
                    <div class="mt-6 w-full md:max-w-full flex flex-col md:flex-row  gap-4 columns-2 ">
                  
                        <!-- Conteneur du segment -->
                        <div class="w-1/2">
                            <label for="devise" class="block font-Alumni text-md md:text-lg mb-2">
                                Devise
                            </label>
                            <!-- Select -->
                            <select name="devise" id="devise" class="font-Alumni form-select w-full">
                                <option value="" disabled selected class="font-Alumni">Choisir une devise</option>
                                <option value="CAD">CAD</option>
                                <option value="USD">USD</option>
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
                                <option value=""  disabled selected  class="font-Alumni">Mode de communication</option>
                                <option value="courriel">Courriel</option>
                                <option value="courrier">Courrier régulier</option>
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

                <button type="submit" class="mt-4 w-full text-white bg-tertiary-400 hover:bg-tertiary-300 py-2.5 rounded transition duration-300 ease-in-out">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Enregistrer mes informations </h1>
                </button>
                <button type="button" class="mt-4 w-full text-white bg-tertiary-300 hover:bg-tertiary-400 py-2.5 rounded transition duration-300 ease-in-out">
                    <h1 class="font-Alumni font-bold text-lg md:text-2xl">Remplir mes informations financières plus tard</h1>
                </button>

            </div>
        </div>
    </form>
@endsection
