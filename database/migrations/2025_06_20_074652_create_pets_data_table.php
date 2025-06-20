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
        Schema::create('pets_data', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('species');
        $table->string('breed')->unique();
        $table->integer('age');
        $table->string('gender');
        $table->string('size');
        $table->string('color');
        $table->string('description');
        $table->string('location');
        $table->string('vaccinated');
        $table->string('spayed');
        $table->boolean('good_with_kids');
        $table->boolean('good_with_pets');
        $table->integer('energy_level');
        $table->json('photos')->nullable();

        $table->rememberToken();
        // $table->string('role');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets_data');
    }
};
