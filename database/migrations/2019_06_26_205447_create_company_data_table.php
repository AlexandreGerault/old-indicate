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
            $table->integer('share_capital')->default(0);
            $table->integer('employees_number')->default(0);
            $table->integer('clients_number')->default(0);
            $table->integer('turnover')->default(0);
            $table->integer('turnover_projection')->default(0);
            $table->integer('average_monthly_turnover')->default(0);
            $table->integer('logistic_cost')->default(0);
            $table->integer('marketing_cost')->default(0);
            $table->integer('banking_investment')->default(0);
            $table->integer('ebitda')->default(0);
            $table->integer('investment_sought')->default(0);
            $table->integer('gross_margin')->default(0);
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
