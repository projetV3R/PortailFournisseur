<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brochures_cartes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type_de_fichier');
            $table->string('chemin');
            $table->integer('taille');
            $table->foreignId('fiche_fournisseur_id')->constrained(); // Cle etrangere vers la table fiche fournisseur
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brochures_cartes');
    }
};