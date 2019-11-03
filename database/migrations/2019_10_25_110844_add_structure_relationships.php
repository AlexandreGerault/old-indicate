<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStructureRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('structures', function (Blueprint $table ) {
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('contact_id')->references('id')->on('contact_means')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('structures', function (Blueprint $table) {
            $table->dropForeign('structures_address_id_foreign');
            $table->dropForeign('structures_contact_id_foreign');
        });
    }
}
