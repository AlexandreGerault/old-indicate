<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_data', function (Blueprint $table) {
            $table->increments('id');

            $table->string('funding_domain');
            $table->string('company_type');
            $table->integer('funding_min');
            $table->integer('funding_max');
            $table->string('funding_location');
            $table->string('funding_way');
            $table->string('funding_step');
            $table->boolean('provide_consulting');
            $table->integer('financial_means');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investor_data');
    }
}
