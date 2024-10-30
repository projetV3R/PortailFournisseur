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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('fonction');
            $table->string('adresse_courriel');
            $table->foreignId('fiche_fournisseur_id')->constrained('fiche_fournisseurs')->onDelete('cascade'); // Cle etrangere vers la table fiches fournisseurs
            $table->foreignId('telephone_id')->constrained('telephones');   // Cle etrangere vers la table fiches telephones
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
