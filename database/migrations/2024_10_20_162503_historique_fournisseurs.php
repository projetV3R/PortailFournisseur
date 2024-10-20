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
            $table->unsignedBigInteger('fournisseur_id');
            $table->string('type_modification'); // 'etat' ou 'modification'
            $table->string('etat')->nullable(); // Pour les changements d'état : 'accepté', 'refusé', 'en attente'
            $table->string('table_modifiee')->nullable(); // Nom de la table modifiée (ex: 'telephone', 'coordonnees')
            $table->text('details_modifications')->nullable(); // Détails des modifications (ajout, suppression, mise à jour)
            $table->text('raison')->nullable(); // Pour les raisons des changements d'état
            $table->timestamp('date_modification')->useCurrent();
            $table->timestamps();

            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade');
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
