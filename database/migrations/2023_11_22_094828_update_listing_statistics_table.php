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
        Schema::table('listing_statistics', function (Blueprint $table) {
            $table->dropForeign('listing_statistics_listing_id_foreign');
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listing_statistics', function (Blueprint $table) {
            $table->dropForeign('listing_statistics_listing_id_foreign');
            $table->foreign('listing_id')->references('id')->on('listings');
        });
    }
};
