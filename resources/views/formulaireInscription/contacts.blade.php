@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.app')

@section('title', 'Contacts')

@section('contenu')
    <form action="{{ route('storeContacts') }}" method="post">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 p-8 lg:p-16">
            <!-- Première colonne -->
            <div>
                <h6 class="font-Alumni font-bold text-3xl md:text-5xl">CONTACTS</h6>
                <h1 class="font-Alumni font-semibold text-md md:text-lg mt-2">Pour rester plus proches de vous !</h1>

                <div class="bg-primary-100 py-8 px-4 mt-8 ">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Information generale</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">
                        <div class="w-full">
                            <label for="prenom" class="block font-Alumni text-md md:text-lg mb-2">
                                Prenom
                            </label>
                            <input type="text" id="prenom" name="prenom" placeholder="Doe"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('prenom')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md">
                        <label for="nom" class="block font-Alumni text-md md:text-lg mb-2">
                            Nom
                        </label>

                        <input type="text" id="nom" name="nom" placeholder="John"
                            class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                        @error('nom')
                            <span
                                class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="fonction" class="block font-Alumni text-md md:text-lg mb-2">
                                Fonction
                            </label>
                            <input type="text" id="fonction" name="fonction" placeholder="Comptable"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('fonction')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="email" class="block font-Alumni text-md md:text-lg mb-2">
                                Email
                            </label>
                            <input type="text" id="email" name="email" placeholder="johndoe@gmail.com"
                                class="font-Alumni w-full p-2 h-12 h-12focus:outline-none focus:border-blue-500 border border-black">

                            @error('email')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième colonne -->
            <div>
                <h6 class="font-Alumni text-white font-bold text-3xl md:text-5xl hide">Merci de vous identifier !</h6>
                <h1 class="font-Alumni text-white font-semibold text-md md:text-lg mt-2">Dites-nous en plus sur vous
                </h1>

                <div class="bg-secondary-100 py-8 px-4 mt-8">
                    <h4 class="font-Alumni font-bold text-lg md:text-2xl underline">Numero de telephone</h4>

                    <div class="mt-6 w-full max-w-md flex gap-4 columns-2 ">

                        <div class="w-full">
                            <label for="ligne" class="block font-Alumni text-md md:text-lg mb-2">
                                Ligne
                            </label>

                            <input type="text" id="ligne" name="ligne" placeholder="Fixe"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('ligne')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="w-full">
                            <label for="numeroTelephone" class="block font-Alumni text-md md:text-lg mb-2">
                                Numero Telephone
                            </label>

                            <input type="phonenumber" id="numeroTelephone" name="numeroTelephone" placeholder="514-453-9867"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('numeroTelephone')
                                <span
                                    class="font-Alumni text-lg flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                        <div class="w-full">
                            <label for="poste" class="block font-Alumni text-md md:text-lg mb-2">
                                Poste
                            </label>

                            <input type="text" id="poste" name="poste" placeholder="9845"
                                class="font-Alumni w-full p-2 h-12 focus:outline-none focus:border-blue-500 border border-black">

                            @error('poste')
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
