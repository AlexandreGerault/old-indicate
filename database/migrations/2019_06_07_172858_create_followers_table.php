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
            $table->integer('follower_id')->unsigned()->index();
            $table->integer('following_id')->unsigned()->index();
            $table->timestamps();
        });
        
        Schema::table('followers', function (Blueprint $table) {
            $table->primary(['follower_id', 'following_id']);
            $table->foreign('follower_id')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('following_id')->references('id')->on('structures')->onDelete('cascade');
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
            $table->dropForeign('followers_following_id_foreign');
        });
        Schema::dropIfExists('followers');
    }
}
