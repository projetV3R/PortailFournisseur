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
        Schema::create('unspsc_codes', function (Blueprint $table) {
            $table->id();
            $table->string('segment');
            $table->string('segment_title_en');
            $table->string('segment_title_fr');
            $table->string('family');
            $table->string('family_title_en');
            $table->string('family_title_fr');
            $table->string('class');
            $table->string('class_title_en');
            $table->string('class_title_fr');
            $table->string('commodity')->unique();
            $table->string('commodity_title_en');
            $table->string('commodity_title_fr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unspsc_codes');
    }
};
