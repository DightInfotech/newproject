<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearProjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_projections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('gross_market_rent')->nullable();
            $table->string('loss_to_lease')->nullable();
            $table->string('gross_potential_rent')->nullable();
            $table->string('vacancy_loss')->nullable();
            $table->string('concessions')->nullable();
            $table->string('non_revenue_units')->nullable();
            $table->string('employee_discounts')->nullable();
            $table->string('bad_debt')->nullable();
            $table->string('total_rental_income')->nullable();
            $table->string('economic_occupancy')->nullable();
            $table->string('green_fee')->nullable();
            $table->string('short_term_premiums')->nullable();
            $table->string('carport_garages')->nullable();
            $table->string('electricity_tenant_reim')->nullable();
            $table->string('other_income')->nullable();
            $table->string('total_other_income')->nullable();
            $table->string('effective_gross_income')->nullable();

            $table->string('professional_fees')->nullable();
            $table->string('offsite_management')->nullable();
            $table->string('administrative')->nullable();
            $table->string('marketing_promotions')->nullable();
            $table->string('repairs_maintenance')->nullable();
            $table->string('contracts')->nullable();
            $table->string('utilities')->nullable();
            $table->string('internet_cable')->nullable();
            $table->string('management_fee')->nullable();
            $table->string('insurance')->nullable();
            $table->string('real_estate_taxes')->nullable();
            $table->string('operating_expenses')->nullable();
            $table->string('net_operating_income')->nullable();
            $table->string('reserves_replacements')->nullable();
            $table->string('net_cash_flow_after_reserves')->nullable();

            $table->string('projecting_increase_market_rents')->nullable();
            $table->string('loss_lease_general')->nullable();
            $table->string('vacancy_loss_general')->nullable();
            $table->string('concessions_general')->nullable();
            $table->string('non_revenue_units_general')->nullable();
            $table->string('employee_discounts_general')->nullable();
            $table->string('bad_debt_general')->nullable();
            $table->string('other_income_general')->nullable();
            $table->string('total_operating_expenses_general')->nullable();

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
        Schema::dropIfExists('year_projections');
    }
}
