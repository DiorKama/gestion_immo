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
        Schema::table('featured_listings', function (Blueprint $table) {
            $table->dropForeign('featured_listings_listing_id_foreign');
            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
            $table->dropForeign('featured_listings_product_id_foreign');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('featured_listings', function (Blueprint $table) {
            $table->dropForeign('featured_listings_listing_id_foreign');
            $table->foreign('listing_id')->references('id')->on('listings');
            $table->dropForeign('featured_listings_product_id_foreign');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
};
