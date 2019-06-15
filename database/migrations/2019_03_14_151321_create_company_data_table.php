<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('structure_id')->unsigned();
            $table->boolean('accept_offers');
            $table->boolean('partnership');
            $table->boolean('bank_funding');
            $table->boolean('wcr');
            $table->boolean('shareholding');
            $table->boolean('looking_for_funding');
            $table->boolean('looking_for_accompaniment');
            $table->integer('share_capital');
            $table->integer('employees_number');
            $table->integer('turnover');
            $table->integer('turnover_progression');
            $table->timestamps();
        });

        Schema::table('company_data', function (Blueprint $table) {
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_data', function (Blueprint $table) {
            $table->dropForeign('company_data_structure_id_foreign');
        });
        Schema::dropIfExists('company_data');
    }
}
