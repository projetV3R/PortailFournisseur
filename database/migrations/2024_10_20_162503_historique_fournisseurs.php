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
        Schema::create('historique_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiche_fournisseur_id')->constrained();
            $table->string('type_modification')->nullable();
            $table->string('etat')->nullable();
            $table->string('table_modifiee')->nullable();
            $table->text('details_modifications')->nullable();
            $table->text('raison')->nullable();
            $table->timestamp('date_modification')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
