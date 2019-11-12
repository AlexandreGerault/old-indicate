<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('skills');
            $table->integer('expertise');
            $table->integer('market');
            $table->integer('advantage_designed');
            $table->integer('team');
            $table->integer('shareholding_created');
            $table->integer('input_barrier');
            $table->integer('value_creation');

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
        Schema::dropIfExists('company_ratings');
    }
}
