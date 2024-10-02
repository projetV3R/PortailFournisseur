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
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="family" class="block text-gray-700">Famille</label>
            <select id="family" name="family" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez une famille --</option>
            </select>
        </div>

        <div>
            <label for="class" class="block text-gray-700">Classe</label>
            <select id="class" name="class" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez une classe --</option>
            </select>
        </div>

        <div>
            <label for="commodity" class="block text-gray-700">Commodité</label>
            <select id="commodity" name="commodity" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Sélectionnez une commodité --</option>
            </select>
        </div>
    </div>
</div>

<script>
    $('#segment').change(function() {
        var segmentId = $(this).val();
        $.ajax({
            url: '/get-families',
            type: 'POST',
            data: {
                segment: segmentId
            },
            success: function(families) {
                $('#family').empty();
                $.each(families, function(key, family) {
                    $('#family').append('<option value="' + family.id + '">' + family.familyTitleFr + '</option>');
                });
            }
        });
    });

    $('#family').change(function() {
        var familyId = $(this).val();
        $.ajax({
            url: '/get-classes',
            type: 'POST',
            data: {
                family: familyId
            },
            success: function(classes) {
                $('#class').empty();
                $.each(classes, function(key, classe) {
                    $('#class').append('<option value="' + classe.id + '">' + classe.classTitleFr + '</option>');
                });
            }
        });
    });

    $('#class').change(function() {
        var classId = $(this).val();
        $.ajax({
            url: '/get-commodities',
            type: 'POST',
            data: {
                class: classId
            },
            success: function(commodities) {
                $('#commodity').empty();
                $.each(commodities, function(key, commodity) {
                    $('#commodity').append('<option value="' + commodity.id + '">' + commodity.commodityTitleFr + '</option>');
                });
            }
        });
    });
</script>


@endsection
@section('footer')

@endsection