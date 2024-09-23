@extends('layouts.app')

@section('title', 'Test')

@section('contenu')
<h1 class="bg-red-500 text-xl">Test</h1>

<div>
    <ul id="produits-list"></ul>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/produits',
            method: 'GET',
            success: function(data) {
                console.log(data);
                $('#produits-list').empty();

                // Groupement des produits par segment, family et class
                let currentSegment = null;
                let currentFamily = null;
                let currentClass = null;

                data.forEach(function(produit) {
                    if (produit.segment !== currentSegment) {
                        currentSegment = produit.segment;
                        $('#produits-list').append(`<li><strong>Segment: ${produit.segment} ${produit.segmentTitleFr}</strong></li>`);
                    }

                    if (produit.family !== currentFamily) {
                        currentFamily = produit.family;
                        $('#produits-list').append(`<li>  <strong>Family: ${produit.family} ${produit.familyTitleFr}</strong></li>`);
                    }

                    if (produit.class !== currentClass) {
                        currentClass = produit.class;
                        $('#produits-list').append(`<li>    <strong>Class: ${produit.class} ${produit.classTitleFr}</strong></li>`);
                    }

                    $('#produits-list').append(`<li>      Commodity: ${produit.commodity} ${produit.commodityTitleFr}</li>`);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Erreur:', textStatus, errorThrown);
            }
        });
    });
</script>


@endsection