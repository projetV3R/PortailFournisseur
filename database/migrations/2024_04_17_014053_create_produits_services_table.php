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
        Schema::create('produits_services', function (Blueprint $table) {
            $table->id();
            $table->string('nature');
            $table->string('segment');
            $table->string('famille');
            $table->string('classe');
            $table->string('code_categorie');
            $table->string('categorie');
            $table->string('code_unspsc');
            $table->string('description');
            $table->string('details_specifications', 500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits_services');
    }
};