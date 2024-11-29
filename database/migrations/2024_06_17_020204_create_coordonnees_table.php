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
        Schema::create('coordonnees', function (Blueprint $table) {
            $table->id();
            $table->string('numero_civique', 8);
            $table->string('rue', 64);
            $table->string('bureau', 8)->nullable();
            $table->string('ville', 64);
            $table->string('province')->default('Québec');
            $table->string('site_internet')->nullable();
            $table->string('code_postal');
            $table->string('region_administrative')->nullable();
            $table->foreignId('fiche_fournisseur_id')->constrained('fiche_fournisseurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordonnees');
    }
};
