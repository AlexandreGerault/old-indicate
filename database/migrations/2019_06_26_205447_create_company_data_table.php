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
            $table->bigIncrements('id');

            /* Booleans values */
            $table->boolean('accept_offers')->nullable()->default(null);
            $table->boolean('partnership')->nullable()->default(null);
            $table->boolean('bank_funding')->nullable()->default(null);
            $table->boolean('wcr')->nullable()->default(null);
            $table->boolean('shareholding')->nullable()->default(null);
            $table->boolean('looking_for_funding')->nullable()->default(null);
            $table->boolean('looking_for_accompaniment')->nullable()->default(null);

            /* Integer values */
            $table->bigInteger('share_capital')->nullable()->default(null);
            $table->bigInteger('employees_number')->nullable()->default(null);
            $table->bigInteger('clients_number')->nullable()->default(null);
            $table->bigInteger('turnover')->nullable()->default(null);
            $table->bigInteger('turnover_projection')->nullable()->default(null);
            $table->bigInteger('average_monthly_turnover')->nullable()->default(null);
            $table->bigInteger('logistic_cost')->nullable()->default(null);
            $table->bigInteger('marketing_cost')->nullable()->default(null);
            $table->bigInteger('banking_investment')->nullable()->default(null);
            $table->bigInteger('ebitda')->nullable()->default(null);
            $table->bigInteger('investment_sought')->nullable()->default(null);
            $table->bigInteger('gross_margin')->nullable()->default(null);


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
