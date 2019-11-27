<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandsBlacklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands_blacklist', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('structure_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('demands_blacklist', function (Blueprint $table) {
            $table->primary(['user_id', 'structure_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('demands_blacklist', function (Blueprint $table) {
            $table->dropForeign('demands_blacklist_user_id_foreign');
            $table->dropForeign('demands_blacklist_structure_id_foreign');
        });

        Schema::dropIfExists('demands_blacklist');
    }
}
