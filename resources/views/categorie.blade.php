@extends('layouts.app')

@section('title', 'Municipalités')

@section('header')
<h1 class="font-alumni-sans-bold">HEADER</h1>

@section('contenue')

<div class="bg-blue-50 flex items-center justify-center min-h-screen">
<div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <h1 class="text-xl font-bold mb-4 border-b pb-2">Produits et services</h1>
        
        <div class="mb-4">
            <label for="segment" class="block text-gray-700">Segment</label>
            <select id="segment" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Sélectionnez un segment</option>
                <!-- Ajoutez des options ici -->
            </select>
        </div>
        
        <div class="mb-4">
            <label for="famille" class="block text-gray-700">Famille</label>
            <select id="famille" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Sélectionnez une famille</option>
                <!-- Ajoutez des options ici -->
            </select>
        </div>
        
        <div>
            <label for="classe" class="block text-gray-700">Classe</label>
            <select id="classe" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Sélectionnez une classe</option>
                <!-- Ajoutez des options ici -->
            </select>
        </div>
    </div>
</div>

@section('footer')

@endsection