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
          $table->string('breed');
          $table->string('age');
          
          // Foreign key fields
          $table->unsignedBigInteger('gender_id');
          $table->unsignedBigInteger('size_id');
          $table->unsignedBigInteger('status_id');
          
          // Fixed foreign key constraints to match exact table names
          $table->foreign('gender_id')->references('id')->on('pets_genders');
          $table->foreign('size_id')->references('id')->on('pets_sizes');
          $table->foreign('status_id')->references('id')->on('pets_statuses');

          $table->string('color');
          $table->text('description');
          $table->string('image');
          $table->string('location');
          $table->date('dateAdded');
          $table->boolean('vaccinated');
          $table->boolean('spayed');
          $table->timestamps();
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
