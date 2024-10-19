@extends('layouts.app')

@section('title', 'LoginFournisseur')

@section('contenu')

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4">
            <div class="col-span-1 md:col-span-12 text-center mt-8 md:mt-24">
                <h1 class="text-2xl md:text-5xl font-bold font-Alumni">Bienvenue</h1>
                <h6 class="mt-2 text-base md:text-lg font-Alumni">Dans quelle catégorie vous inscrivez-vous ?</h6>
            </div>

            <div class="col-span-1 md:col-span-12">
                <div class="flex flex-wrap justify-center gap-4 mt-8 md:mt-16">
                    <a href="{{ route('showLoginFormAvecNeq') }}">
                        <div
                            class="w-32 h-32 md:w-44 md:h-44 lg:w-56 lg:h-56 px-4 bg-primary-300 flex items-center justify-center cursor-pointer transform hover:scale-105 transition-transform duration-300 ease-in-out">
                            <p class="text-center text-black text-lg md:text-2xl font-bold font-Alumni">Une entreprise ou un
                                particulier avec
                                NEQ</p>
                        </div>
                    </a>

                    <a href="{{ route('showLoginFormSansNeq') }}">
                        <div
                            class="w-32 h-32 md:w-44 md:h-44 lg:w-56 lg:h-56 px-4 bg-secondary-300 flex items-center justify-center cursor-pointer transform hover:scale-105 transition-transform duration-300 ease-in-out">

                            <p class="text-center text-black text-lg md:text-2xl font-bold font-Alumni">Une entreprise ou un
                                particulier sans
                                un NEQ</p>
                        </div>
                    </a>

                    <a href="{{ route('CreateIdentification') }}">
                        <div
                            class="w-32 h-32 md:w-44 md:h-44 lg:w-56 lg:h-56 px-4 bg-tertiary-300 flex items-center justify-center cursor-pointer transform hover:scale-105 transition-transform duration-300 ease-in-out">

                            <p class="text-center text-black text-lg md:text-2xl font-bold font-Alumni">Pas de compte ?
                                Inscrivez vous !</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
