<?php /** @noinspection PhpUndefinedClassInspection */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('comment');
            $table->string('avatar')->default('structure.svg');
            $table->bigInteger('siren');
            $table->bigInteger('siret');
            $table->boolean('verified')->default(false);
            $table->bigInteger('address_id')->unsigned()->nullable()->default(null);
            $table->bigInteger('contact_id')->unsigned()->nullable()->default(null);

            /**
             * Polymorphic relation keys
             */
            $table->bigInteger('data_id')->nullable()->default(null);
            $table->string('data_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
}
