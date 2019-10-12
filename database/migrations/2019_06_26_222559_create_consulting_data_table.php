<?php /** @noinspection PhpUndefinedClassInspection */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultingDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulting_data', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('five_years_survival_rate');
            $table->string('consulting_type');
            $table->boolean('funding_help');
            $table->string('company_type');
            $table->string('consulting_domain');
            $table->string('seeking_location');

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
        Schema::dropIfExists('consulting_data');
    }
}
