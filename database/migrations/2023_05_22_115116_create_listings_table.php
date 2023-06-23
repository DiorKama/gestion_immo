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
            $table->string('slug');
            $table->boolean('enabled')->default(1);
            $table->text('description');
            $table->integer('area')->default(0);
            $table->integer('rooms')->default(0);
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('price')->default(0);
            $table->boolean('sold')->default(0);
            $table->foreignId('location_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->datetime('disable_at')->nullable();
            $table->datetime('first_online_at')->nullable();
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
