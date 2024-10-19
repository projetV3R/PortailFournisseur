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
        Schema::create('coordonnee_telephone', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coordonnee_id');
            $table->unsignedBigInteger('telephone_id');
            $table->timestamps();

            $table->foreign('coordonnee_id')->references('id')->on('coordonnees')->onDelete('cascade');
            $table->foreign('telephone_id')->references('id')->on('telephones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordonnee_contact');
    }
};
