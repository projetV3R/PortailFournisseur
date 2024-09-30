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
        Schema::create('classes_commoditys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('commodity_id');

            $table->foreign('class_id')->references('class')->on('classes')->onDelete('cascade');
            $table->foreign('commodity_id')->references('commodity')->on('commoditys')->onDelete('cascade');

            $table->unique(['class_id', 'commodity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_commoditys');
    }
};
