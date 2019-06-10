<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('follower_id')->unsigned();
            $table->integer('followed_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('followers', function (Blueprint $table) {
            $table->foreign('follower_id')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('followed_id')->references('id')->on('structures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('followers', function (Blueprint $table) {
            $table->dropForeign('followers_follower_id_foreign');
            $table->dropForeign('followers_followed_id_foreign');
        });
        Schema::dropIfExists('followers');
    }
}
