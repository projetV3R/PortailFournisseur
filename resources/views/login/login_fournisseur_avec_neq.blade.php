@extends('layouts.app')

@section('title', 'LoginFournisseurAvecNeq')

@section('contenu')

    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2  p-4">
            <div class="">
                <div class="ml-4">
                    <h1 class="font-Alumni font-bold text-3xl md:text-6xl">Bon retour !</h1>
                    <h6 class="font-Alumni md:text-xl mt-2">Connectez vous pour avoir acces a votre fiche !</h6>

                    <form action="" class="mt-6">
                        <div>
                            <label for="numeroEntreprise" class="block font-Alumni md:text-lg mb-2">
                                Numéro d’entreprise du Québec (NEQ)
                            </label>
                            <input type="text" id="numeroEntreprise" name="numeroEntreprise"
                                placeholder="Entrer votre numero d'entreprise"
                                class="font-Alumni w-1/2 p-2 focus:outline-none focus:border-blue-500 border border-black">
                            <div class= "w-1/2 flex justify-end">
                                <h6 class="font-Alumni md:text-base mt-2 text-secondary-400">Pas de NEQ ?</h6>
                            </div>
                        </div>

                        <div class="mt-2">
                            <label for="numeroEntreprise" class="block font-Alumni md:text-lg mb-2">
                                Mot de passe
                            </label>
                            <input type="text" id="numeroEntreprise" name="numeroEntreprise"
                                placeholder="Entrer votre mot de passe"
                                class="font-Alumni w-1/2 p-2 focus:outline-none focus:border-blue-500 border border-black">
                            <div class= "w-1/2 flex justify-end">
                                <h6 class="font-Alumni md:text-base mt-2 text-secondary-400">mot de passe oublié ?</h6>
                            </div>
                        </div>

                        <div class="bg-red-500 w-1/2 mt-12">
                            <button type="button" class="w-full text-white bg-blue-700 hover:bg-blue-800 py-2.5">
                                <h1 class="font-Alumni font-bold md:text-2xl">Suivant</h1>
                            </button>
                        </div>


                    </form>

                    <div class="mt-4">
                        <h6 class="font-Alumni font-semibold md:text-base">Première connexion ou NEQ non trouvée ?</h6>
                        <h6 class="font-Alumni font-semibold md:text-base text-secondary-400">Soumettre une demande !</h6>
                    </div>
                </div>



            </div>

            <div class="bg-blue-500">
                <div class="bg-gray-100 p-4">
                    <img src="output-onlinegiftools.gif" alt="GIF animé" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>

@endsection
