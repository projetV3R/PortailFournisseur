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
        Schema::create('produit_service_fiche_fournisseur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_service_id')->constrained('produits_services');
            $table->foreignId('fiche_fournisseur_id')->constrained('fiche_fournisseurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_service_fiche_fournisseur');
    }
};