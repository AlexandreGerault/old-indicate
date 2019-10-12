<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_demands', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('structure_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('claim_demands', function (Blueprint $table) {
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
        Schema::table('claim_demands', function (Blueprint $table) {
            $table->dropForeign('claim_demands_user_id_foreign');
            $table->dropForeign('claim_demands_structure_id_foreign');
        });
        Schema::dropIfExists('claim_demands');
    }
}
