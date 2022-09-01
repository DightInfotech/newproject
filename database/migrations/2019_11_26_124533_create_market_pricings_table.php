<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->default(0);
            $table->string('price')->nullable();
            $table->string('price_per_unit')->nullable();
            $table->string('price_per_sf')->nullable();
            $table->string('down_payment_perc')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('cap_rate')->nullable();
            $table->string('grm')->nullable();
            $table->string('first_trust_mortage')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('net_operating_income')->nullable();
            $table->string('debt_service')->nullable();
            $table->string('debt_coverage_ratio')->nullable();
            $table->string('net_cash_flow_after')->nullable();
            $table->string('debt_service_return')->nullable();
            $table->string('principal_reduction')->nullable();
            $table->string('total_return')->nullable();
            $table->string('total_return_perc')->nullable();
            $table->string('pricing_type')->nullable();
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
        Schema::dropIfExists('market_pricings');
    }
}
