<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('gross_potential_rent')->nullable();
            $table->string('other_income')->nullable();
            $table->string('gross_potential_income')->nullable();
            $table->string('vacancy_percentage')->nullable();
            $table->string('vacancy_percentage_proforma')->nullable();
            $table->string('vacancy_collection_reserve')->nullable();
            $table->string('effective_gross_income')->nullable();
            $table->string('real_estate_taxes')->nullable();
            $table->string('marketing')->nullable();
            $table->string('onsite_management')->nullable();
            $table->string('administration')->nullable();
            $table->string('maintenance')->nullable();
            $table->string('contract_services')->nullable();
            $table->string('utilities')->nullable();
            $table->string('offsite_management')->nullable();
            $table->string('insurance')->nullable();
            $table->string('professional_fees')->nullable();
            $table->string('reserves')->nullable();
            $table->string('total_expenses')->nullable();
            $table->string('expenses_per_sf')->nullable();
            $table->string('perc_egi')->nullable();
            $table->string('net_operating_income')->nullable();

            $table->string('gross_potential_rent_proforma')->nullable();
            $table->string('other_income_proforma')->nullable();
            $table->string('gross_potential_income_proforma')->nullable();
            $table->string('vacancy_collection_reserve_proforma')->nullable();
            $table->string('effective_gross_income_proforma')->nullable();
            $table->string('real_estate_taxes_proforma')->nullable();
            $table->string('marketing_proforma')->nullable();
            $table->string('onsite_management_proforma')->nullable();
            $table->string('administration_proforma')->nullable();
            $table->string('maintenance_proforma')->nullable();
            $table->string('contract_services_proforma')->nullable();
            $table->string('utilities_proforma')->nullable();
            $table->string('offsite_management_proforma')->nullable();
            $table->string('insurance_proforma')->nullable();
            $table->string('professional_fees_proforma')->nullable();
            $table->string('reserves_proforma')->nullable();
            $table->string('total_expenses_proforma')->nullable();
            $table->string('expenses_per_sf_proforma')->nullable();
            $table->string('perc_egi_proforma')->nullable();
            $table->string('net_operating_income_proforma')->nullable();

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
        Schema::dropIfExists('income_expenses');
    }
}
