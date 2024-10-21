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
        Schema::create('fiche_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('neq')->unique();
            $table->string('etat')->default('En attente');
            $table->string('nom_entreprise');
            $table->string('adresse_courriel')->unique();
            $table->string('password');
            $table->string('details_specifications', 500);
            $table->timestamp('date_changement_etat')->nullable();
            $table->timestamps();
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiches_fournisseurs');
    }
};
