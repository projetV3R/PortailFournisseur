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
        Schema::create('familys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family')->length(11);
            $table->string('familyTitleFr');

            $table->unique(['family', 'familyTitleFr']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familys');
    }
};
