<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('cover_page_1')->nullable();
            $table->string('cover_page_2')->nullable();
            $table->string('price')->nullable();
            $table->string('price_per_unit')->nullable();
            $table->string('price_per_sf')->nullable();
            $table->string('down_payment_perc')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('number_of_units')->nullable();
            $table->string('rentable_square_feet')->nullable();
            $table->string('number_of_buildings')->nullable();
            $table->string('number_of_stories')->nullable();
            $table->string('year_built')->nullable();
            $table->string('lot_size')->nullable();
            $table->string('cap_rate_current')->nullable();
            $table->string('grm_current')->nullable();
            $table->string('net_operating_income')->nullable();
            $table->string('net_cash_flow_after_debt')->nullable();
            $table->string('total_return')->nullable();
            $table->string('cap_rate_proforma')->nullable();
            $table->string('grm_proforma')->nullable();
            $table->string('net_operating_income_proforma')->nullable();
            $table->string('net_cash_flow_after_debt_proforma')->nullable();
            $table->string('total_return_proforma')->nullable();

            $table->string('cover_page_3')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('loan_type')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('amortization')->nullable();
            $table->string('due_date')->nullable();
            $table->string('lender_name')->nullable();
            $table->string('trust_loan_amount')->nullable();
            $table->string('trust_loan_type')->nullable();
            $table->string('trust_interest_rate')->nullable();
            $table->string('trust_amortization')->nullable();
            $table->string('trust_program')->nullable();
            $table->string('trust_loan_value')->nullable();
            $table->string('trust_debt_coverage_ratio')->nullable();

            $table->foreign('memorandum_id')->references('id')->on('memorandums');

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
        Schema::dropIfExists('pricing_financials');
    }
}
