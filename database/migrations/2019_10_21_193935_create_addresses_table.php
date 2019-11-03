<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postcode');
            $table->integer('house_number');
            $table->string('county');
            $table->string('country');
            $table->string('road');
            $table->string('city');
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->unique(['postcode', 'house_number', 'county', 'country', 'road', 'city'], 'address_index_primary_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
