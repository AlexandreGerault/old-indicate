<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultingRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulting_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('support_quality');
            $table->integer('procedure_simplicity');
            $table->integer('procedure_speed');
            $table->integer('global_rating');
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
        Schema::dropIfExists('consulting_ratings');
    }
}
