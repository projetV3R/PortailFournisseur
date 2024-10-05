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
            $table->string('adresse_courrriel');
            $table->integer('ligne');
            $table->string('poste');
            $table->string('numero_telephone');
            $table->foreignId('fiche_fournisseur_id')->constrained(); // Cle etrangere vers la table fiches fournisseurs
            $table->unsignedBigInteger('telephone_id');   // Cle etrangere vers la table fiches telephones
            $table->timestamps();

            $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
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
