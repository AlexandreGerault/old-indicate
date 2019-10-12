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

            $table->string('funding_domain')->nullable()->default(null);
            $table->string('company_type')->nullable()->default(null);
            $table->integer('funding_min')->nullable()->default(null);
            $table->integer('funding_max')->nullable()->default(null);
            $table->string('funding_location')->nullable()->default(null);
            $table->string('funding_way')->nullable()->default(null);
            $table->string('funding_step')->nullable()->default(null);
            $table->boolean('provide_consulting')->nullable()->default(null);
            $table->integer('financial_means')->nullable()->default(null);

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
