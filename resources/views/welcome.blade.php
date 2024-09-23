@extends('layouts.app')

@section('title', 'Test')

@section('contenu')
<h1 class="bg-red-500 text-xl">Test</h1>

<div>
    @foreach($categories as $categorie)
        <li>{{$categorie->segment}}</li>
        <li>{{$categorie->family}}</li>
        <li>{{$categorie->class}}</li>
        <li>{{$categorie->commodity}}</li>
    @endforeach
</div>


@endsection