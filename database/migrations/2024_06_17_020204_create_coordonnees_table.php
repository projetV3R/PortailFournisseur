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
            $table->string('bureau', 8);
            $table->string('ville', 64);
            $table->string('province');
            $table->string('site_internet');
            $table->string('code_postal');
            $table->string('code_region_administrative');
            $table->string('region_administrative');
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
