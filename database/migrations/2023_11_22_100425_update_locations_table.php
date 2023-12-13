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
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign('locations_country_id_foreign');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->dropForeign('locations_region_id_foreign');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign('locations_country_id_foreign');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->dropForeign('locations_region_id_foreign');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }
};
