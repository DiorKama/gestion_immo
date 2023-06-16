<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCountryCodeColumnInUsersTable extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE users CHANGE COLUMN country_code mobile_number_country VARCHAR(255)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE users CHANGE COLUMN mobile_number_country country_code VARCHAR(255)');
    }
}


