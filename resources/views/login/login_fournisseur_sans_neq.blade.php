@extends('layouts.app')

@section('title', 'LoginFournisseurSansNeq')

@section('contenu')

    <div class="container mx-auto bg-[url('images/vector1.svg')] bg-no-repeat bg-right bg-cover p-8 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
            <div class="flex flex-col justify-center">
                <div class="mx-4">
                    <h1 class="font-Alumni font-bold text-3xl md:text-6xl">Bon retour !</h1>
                    <h6 class="font-Alumni md:text-xl mt-2">Connectez-vous pour avoir accès à votre fiche !</h6>

                    <form action="{{ route('loginSansNeq') }}" method="post" class="mt-6">
                        @csrf
                        <div class="mb-4">
                            <label for="adresse_courriel" class="block font-Alumni md:text-lg mb-2">
                                Adresse courriel
                            </label>
                            <input type="text" value="{{ old('adresse_courriel') }}" id="adresse_courriel"
                                name="adresse_courriel" placeholder="Entrer votre adresse courriel"
                                class="font-Alumni w-full md:w-2/3 p-2 focus:outline-none focus:border-blue-500 border border-black">
                            <div class="w-full md:w-2/3">
                                @error('adresse_courriel')
                                    <span class="text-red-500 font-Alumni md:text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        
                                <div class="w-full md:w-2/3 flex justify-end mt-2">
                                    <a href="{{ route('showLoginFormAvecNeq') }}">
                                    <h6 class="font-Alumni md:text-base text-secondary-400 cursor-pointer">Avez vous un NEQ
                                        ?
                                    </h6>
                                </a>
                                </div>
                          

                        </div>

                        <div class="mb-4">
                            <label for="motDePasse" class="block font-Alumni md:text-lg mb-2">
                                Mot de passe
                            </label>
                            <input type="password" id="motDePasse" name="motDePasse" placeholder="Entrer votre mot de passe"
                                class="font-Alumni w-full md:w-2/3 p-2 focus:outline-none focus:border-blue-500 border border-black">
                            <div class="w-full md:w-2/3">
                                @error('motDePasse')
                                    <span class="text-red-500 font-Alumni md:text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full md:w-2/3 flex justify-end mt-2">
                                <h6 class="font-Alumni md:text-base text-secondary-400 cursor-pointer">Mot de passe oublié ?
                                </h6>
                            </div>
                        </div>

                        @if ($errors->has('login_error'))
                            <div class="mb-4">
                                <span class="text-red-500 font-Alumni md:text-sm">
                                    {{ $errors->first('login_error') }}
                                </span>
                            </div>
                        @endif

                        <div class="bg-red-500 w-full md:w-2/3 mt-6 rounded">
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 py-2.5">
                                <h1 class="font-Alumni font-bold text-lg md:text-2xl">Connexion</h1>
                            </button>
                        </div>
                    </form>

                    <div class="mt-4">
                        <h6 class="font-Alumni font-semibold text-base md:text-base">Nouvel utilisateur ?</h6>
                        <a href="{{ route('CreateIdentification') }}">
                            <h6 class="font-Alumni font-semibold text-base md:text-base text-secondary-400 cursor-pointer">
                                Inscrivez-vous maintenant !
                            </h6>
                        </a>
                    </div>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center">
                <div class="w-full md:w-3/4">
                    <img src="{{ asset('images/output-onlinegiftools.gif') }}" alt="GIF animé" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>

@endsection
