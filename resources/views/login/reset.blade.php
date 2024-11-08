@extends('layouts.app')

@section('title', 'PageReset')

@section('contenu')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
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
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le Mot de Passe :</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Réinitialiser le Mot de Passe</button>
    </form>
</div>
@endsection
