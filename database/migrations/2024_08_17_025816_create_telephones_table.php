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
        Schema::create('telephones', function (Blueprint $table) {
            $table->id();
            $table->string('numero_telephone');
            $table->integer('ligne');
            $table->string('poste');
            $table->string('type_numero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telephones');
    }
};
