@extends('layouts.app')
@section('title', 'Municipalités')
@section('header')
<h1 class="font-alumni-sans-bold">Liste des municipalités par région</h1>
@endsection
@section('contenue')
<div class="bg-lime-500 p-4">
<div id="municipalites" class="municipalite-container">

</div>
<div id="loading" class="text-center">Chargement des municipalités...</div> 
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {

   $.ajax({
     url: '/get-municipalites',  
     method: 'GET',
     success: function(response) {
       // Masquer l'indicateur de chargement
       $('#loading').hide();

       let currentRegion = ''; 
       $.each(response, function(index, municipalite) {

         if (currentRegion !== municipalite.regadm) {
           currentRegion = municipalite.regadm;
           $('#municipalites').append('<h2 class="region-title">' + currentRegion + '</h2>');
         }

         $('#municipalites').append(
           $('<div>', {
             text: municipalite.munnom,  
             class: 'municipalite-item'
           })
         );
       });
     },
     error: function(error) {
       console.error('Erreur lors de la récupération des municipalités : ', error);
     }
   });
 });
</script>
<style>
 .municipalite-container {
   max-height: 500px;
   overflow-y: auto;
   padding: 10px;
   border: 1px solid #ccc;
 }
 .municipalite-item {
   padding: 8px;
   border-bottom: 1px solid #ddd;
   color: #333;
   font-size: 1.1em;
 }

 .region-title {
   margin-top: 20px;
   font-size: 1.4em;
   color: #000;
   font-weight: bold;
 }

 #loading {
   margin-top: 20px;
   font-size: 1.2em;
   color: #555;
 }
</style>
@section('footer')
@endsection