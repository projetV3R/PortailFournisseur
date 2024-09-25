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
                @foreach($segments as $segment)
                <option value="{{$segment->segment}}">{{$segment->segmentTitleFr}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="family" class="block text-gray-700">Famille</label>
            <select disabled id="family" name="family" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Sélectionnez une famille</option>
                <!-- Ajoutez des options ici -->
            </select>
        </div>

        <div>
            <label for="class" class="block text-gray-700">Classe</label>
            <select disabled id="class" name="class" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Sélectionnez une classe</option>
                <!-- Ajoutez des options ici -->
            </select>
        </div>

        <div>
            <label for="commodity" class="block text-gray-700">Commodité</label>
            <select disabled id="commodity" name="commodity" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Sélectionnez une commodité</option>
                <!-- Ajoutez des options ici -->
            </select>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#segment').on('change', function() {
            var segment = $(this).val();
            if (segment) {
                $.ajax({
                    url: '/get-families',
                    type: 'POST',
                    data: {
                        segment: segment,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#family').empty().append('<option value="">Sélectionnez une famille</option>');
                        $.each(data, function(key, value) {
                            $('#family').append('<option value="' + value.family + '">' + value.familyTitleFr + '</option>');
                        });
                        $('#family').prop('disabled', false);
                    }
                });
            } else {
                $('#family, #class, #commodity').empty().append('<option value="">Sélectionnez une option</option>').prop('disabled', true);
            }
        });

        $('#family').on('change', function() {
            var segment = $('#segment').val();
            var family = $(this).val();
            if (family) {
                $.ajax({
                    url: '/get-classes',
                    type: 'POST',
                    data: {
                        segment: segment,
                        family: family,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#class').empty().append('<option value="">Sélectionnez une classe</option>');
                        $.each(data, function(key, value) {
                            $('#class').append('<option value="' + value.class + '">' + value.classTitleFr + '</option>');
                        });
                        $('#class').prop('disabled', false);
                    }
                });
            } else {
                $('#class, #commodity').empty().append('<option value="">Sélectionnez une option</option>').prop('disabled', true);
            }
        });

        $('#class').on('change', function() {
            var segment = $('#segment').val();
            var family = $('#family').val();
            var classS = $(this).val();
            if (classS) {
                $.ajax({
                    url: '/get-commodities',
                    type: 'POST',
                    data: {
                        segment: segment,
                        family: family,
                        class: classS,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#commodity').empty().append('<option value="">Sélectionnez une commodité</option>');
                        $.each(data, function(key, value) {
                            $('#commodity').append('<option value="' + value.commodity + '">' + value.commodityTitleFr + '</option>');
                        });
                        $('#commodity').prop('disabled', false);
                    }
                });
            } else {
                $('#commodity').empty().append('<option value="">Sélectionnez une option</option>').prop('disabled', true);
            }
        });
    });
</script>
@endsection
@section('footer')

@endsection