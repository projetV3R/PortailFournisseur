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
        Schema::create('segments_familys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('segment_id');
            $table->integer('family_id');

            $table->foreign('segment_id')->references('segment')->on('segments')->onDelete('cascade');
            $table->foreign('family_id')->references('family')->on('familys')->onDelete('cascade');

            $table->unique(['segment_id', 'family_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('segments_familys');
    }
};
