<?php /** @noinspection PhpUndefinedClassInspection */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_data', function (Blueprint $table) {
            $table->increments('id');

            /* Booleans values */
            $table->boolean('accept_offers')->default(false);
            $table->boolean('partnership')->default(false);
            $table->boolean('bank_funding')->default(false);
            $table->boolean('wcr')->default(false);
            $table->boolean('shareholding')->default(false);
            $table->boolean('looking_for_funding')->default(false);
            $table->boolean('looking_for_accompaniment')->default(false);

            /* Integer values */
            $table->integer('share_capital')->nullable()->default(null);
            $table->integer('employees_number')->nullable()->default(null);
            $table->integer('clients_number')->nullable()->default(null);
            $table->integer('turnover')->nullable()->default(null);
            $table->integer('turnover_projection')->nullable()->default(null);
            $table->integer('average_monthly_turnover')->nullable()->default(null);
            $table->integer('logistic_cost')->nullable()->default(null);
            $table->integer('marketing_cost')->nullable()->default(null);
            $table->integer('banking_investment')->nullable()->default(null);
            $table->integer('ebitda')->nullable()->default(null);
            $table->integer('investment_sought')->nullable()->default(null);
            $table->integer('gross_margin')->nullable()->default(null);


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
        Schema::dropIfExists('company_data');
    }
}
