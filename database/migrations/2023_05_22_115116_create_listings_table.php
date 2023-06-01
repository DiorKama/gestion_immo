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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('surface');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->integer('floor');
            $table->integer('price');
            $table->string('city');
            $table->string('address');
            $table->boolean('sold');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('categorie_id')->constrained();
            $table->foreignId('option_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
