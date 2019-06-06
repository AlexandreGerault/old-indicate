<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('structure_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->string('title')->nullable()->default(null);
            $table->text('content');
            $table->timestamps();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('structure_id')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('news_structure_id_foreign');
            $table->dropForeign('news_author_id_foreign');
        });
        Schema::dropIfExists('news');
    }
}
