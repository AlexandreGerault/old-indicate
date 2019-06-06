<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStructuresAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_structures_authorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_structure_id')->unsigned();
            $table->boolean('create_news')->default(false);
            $table->boolean('edit_news')->default(false);
            $table->boolean('delete_news')->default(false);
            $table->boolean('manage_users')->default(false);
            $table->timestamps();
        });

        Schema::table('users_structures_authorizations', function (Blueprint $table) {
            $table->foreign('user_structure_id')->references('id')->on('users_structures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_structures_authorizations', function (Blueprint $table) {
            $table->dropForeign('users_structures_authorizations_user_structure_id_foreign');
        });
        Schema::dropIfExists('users_structures_authorizations');
    }
}
