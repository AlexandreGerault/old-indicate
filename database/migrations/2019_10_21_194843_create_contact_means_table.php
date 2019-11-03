<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactMeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_means', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mailing_address_id')->unsigned()->nullable()->default(null);
            $table->string('email');
            $table->string('phone_number');

            $table->timestamps();
        });

        Schema::table('contact_means', function (Blueprint $table ) {
            $table->foreign('mailing_address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_means', function (Blueprint $table) {
            $table->dropForeign('contact_means_mailing_address_id_foreign');
        });
        Schema::dropIfExists('contact_means');
    }
}
