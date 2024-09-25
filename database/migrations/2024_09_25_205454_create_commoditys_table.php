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
        Schema::create('commoditys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commodity')->length(11);
            $table->string('commodityTitleFr');

            $table->unique(['commodity', 'commodityTitleFr']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commoditys');
    }
};
