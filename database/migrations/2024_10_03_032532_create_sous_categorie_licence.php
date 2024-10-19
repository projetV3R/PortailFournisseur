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
        $table->unsignedBigInteger('licence_id'); 
        $table->unsignedBigInteger('sous_categorie_id'); 
        $table->timestamps(); 

        $table->foreign('licence_id')->references('id')->on('licences')->onDelete('cascade');
        $table->foreign('sous_categorie_id')->references('id')->on('sous_categories')->onDelete('cascade');
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
