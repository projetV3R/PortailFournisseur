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
        Schema::create('sous_categorie_licence', function (Blueprint $table) {
        $table->id(); 
        $table->foreignId('licence_id')->constrained('licences')->onDelete('cascade');
        $table->foreignId('sous_categorie_id')->constrained('sous_categories')->onDelete('cascade');
        $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_categorie_licence');
    }
};
