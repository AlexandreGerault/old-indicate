<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_authorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('create_news')->default(false);
            $table->boolean('edit_news')->default(false);
            $table->boolean('delete_news')->default(false);
            $table->boolean('follow_structure')->default(false);
            $table->boolean('manage_users')->default(false);
            $table->boolean('access_dashboard')->default(false);
            $table->timestamps();
        });

        Schema::table('users_authorizations', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_authorizations', function (Blueprint $table) {
            $table->dropForeign('users_authorizations_user_id_foreign');
        });
        Schema::dropIfExists('users_authorizations');
    }
}
