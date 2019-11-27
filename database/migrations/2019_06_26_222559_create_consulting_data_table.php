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

            $table->bigInteger('five_years_survival_rate')->nullable()->default(null);
            $table->string('consulting_type')->nullable()->default(null);
            $table->boolean('funding_help')->nullable()->default(null);
            $table->string('company_type')->nullable()->default(null);
            $table->string('consulting_domain')->nullable()->default(null);
            $table->string('seeking_location')->nullable()->default(null);

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
