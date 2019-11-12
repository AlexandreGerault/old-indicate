<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('author_id')->unsigned()->index();
            $table->integer('structure_id')->unsigned()->index();
            $table->string('rating_type');
            $table->integer('rating_id');
            $table->text('comment');
            $table->timestamps();
        });

        Schema::table('ratings', function (Blueprint $table) {
            $table->primary(['author_id', 'structure_id']);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropForeign('ratings_author_id_foreign');
            $table->dropForeign('ratings_structure_id_foreign');
        });
        Schema::dropIfExists('ratings');
    }
}
