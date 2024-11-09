@extends('layouts.app')

@section('title', 'PageReset')

@section('contenu')
    <div class="container mx-auto bg-[url('images/vector1.svg')] bg-no-repeat bg-right bg-cover p-8 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
            <div class="flex flex-col justify-center">
                <div class="mx-4">
                    <h1 class="font-Alumni font-bold text-3xl md:text-6xl">Réinitialiser</h1>
                    <h6 class="font-Alumni md:text-xl mt-2">Inscrivez votre nouveau mot de passe.</h6>
                        <form method="POST" action="{{ route('password.update') }}" class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse Email :</label>
                                <input type="email" name="adresse_courriel" id="adresse_courriel" required value="{{ request('email') }}"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Nouveau Mot de Passe :</label>
                                <input type="password" name="password" id="password" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    @error('password')
                                        <span class="font-Alumni text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="mb-6">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le Mot de Passe :</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    @error('password_confirmation')
                                        <span class="font-Alumni text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Réinitialiser le Mot de Passe
                            </button>
                        </form>
                </div>
            </div>
            <div class="hidden md:flex items-center justify-center">
                <div class="w-full md:w-3/4">
                    <img src="{{ asset('images/passwordGIF.gif') }}" alt="GIF animé" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>

@endsection
