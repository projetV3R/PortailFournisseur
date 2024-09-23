@extends('layouts.app')

@section('title', 'Test')

@section('contenu')
<h1 class="bg-red-500 text-xl">Test</h1>

<div>
    @foreach($categories as $categorie)
    <div>
        <div>
            Segment: {{$categorie->segment}} {{$categorie->segmentTitleFr}}
            <div>
            Family: {{$categorie->family}} {{$categorie->segmentTitleFr}}
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection