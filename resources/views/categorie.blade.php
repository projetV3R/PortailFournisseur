@extends('layouts.app')

@section('title', 'Municipalités')

@section('header')
@endsection

@section('contenu')

<div class="bg-blue-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <h1 class="text-xl font-bold mb-4 border-b pb-2">Produits et services</h1>

        <div class="mb-4">
            <label for="segment" class="block text-gray-700">Segment</label>
            <select id="segment" name="segment" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez un segment --</option>
                @foreach($segments as $segment)
                <option value="{{$segment->segment}}">{{$segment->segmentTitleFr}}</option>
                @endforeach <!-- Segment -->
            </select>
        </div>

        <div class="mb-4">
            <label for="family" class="block text-gray-700">Famille</label>
            <select id="family" name="family" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez une famille --</option>
                @foreach($families as $family)
                <option value="{{$family->family}}">{{$family->familyTitleFr}}</option>
                @endforeach <!-- Family -->
            </select>
        </div>

        <div>
            <label for="class" class="block text-gray-700">Classe</label>
            <select id="class" name="class" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez une classe --</option>
                @foreach($classes as $classe)
                <option value="{{$classe->class}}">{{$classe->classTitleFr}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="commodity" class="block text-gray-700">Commodité</label>
            <select id="commodity" name="commodity" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez une commodité --</option>
                @foreach($commodities as $commodity)
                <option value="{{$commodity->commodity}}">{{$commodity->commodityTitleFr}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@endsection
@section('footer')

@endsection