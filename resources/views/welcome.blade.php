@extends('layouts.app')

@section('title', 'Test')

@section('contenu')
<h1 class="bg-red-500 text-xl">Test</h1>

<span class="iconify" data-icon="mdi:home" data-inline="false"></span>
<div class="w-2/3 m-4">
    <div>
        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Choisir catégories du produit :
        </label>
    </div>
    <div class="flex justify-center p-2 ">
        <select id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach($unspscCodes as $code)
                <option value="{{ $code->segment }}">{{ $code->segment }}</option>
            @endforeach
        </select>
    </div>
</div>


@endsection