<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->after('title', function (Blueprint $table) {
                $table->foreignId('country_id')->nullable()->constrained();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
        });
    }
};
