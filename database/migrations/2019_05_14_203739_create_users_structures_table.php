<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_structures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->integer('structure_id')->unsigned();
            $table->integer('status')->default(1);
            $table->string('jobname')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('users_structures', function (Blueprint $table ) {
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
        Schema::table('users_structures', function (Blueprint $table) {
            $table->dropForeign('users_structures_user_id_foreign');
            $table->dropForeign('users_structures_structure_id_foreign');
        });
        Schema::dropIfExists('users_structures');
    }
}
