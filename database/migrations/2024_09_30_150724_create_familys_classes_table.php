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
        Schema::create('familys_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id');
            $table->integer('classe_id');

            $table->foreign('family_id')->references('family')->on('familys')->onDelete('cascade');
            $table->foreign('classe_id')->references('class')->on('classes')->onDelete('cascade');

            $table->unique(['family_id', 'classe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familys_classes');
    }
};
