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
        Schema::create('listing_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained();
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('enquiry_count')->default(0);
            $table->unsignedInteger('phone_number_views')->default(0);
            $table->unsignedInteger('whatsapp_views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_statistics');
    }
};
