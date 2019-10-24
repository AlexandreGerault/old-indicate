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
            $table->bigIncrements('id');
            $table->integer('postal_code');
            $table->integer('street_number');
            $table->integer('department_id');
            $table->integer('region_id');
            $table->string('street_name');
            $table->string('city_name');
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->primary(['id', 'postal_code', 'street_number', 'department_id', 'region_id', 'street_name', 'city_name']);
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
