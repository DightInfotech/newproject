<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingExchangeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_exchange_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->default(0);
            $table->string('sales_range_price1')->nullable();
            $table->string('sales_range_price2')->nullable();
            $table->string('sales_range_price3')->nullable();

            $table->string('existing_debt_retirement1')->nullable();
            $table->string('existing_debt_retirement2')->nullable();
            $table->string('existing_debt_retirement3')->nullable();

            $table->string('sales_escrow_fees1')->nullable();
            $table->string('sales_escrow_fees2')->nullable();
            $table->string('sales_escrow_fees3')->nullable();

            $table->string('seller_net_proceeds1')->nullable();
            $table->string('seller_net_proceeds2')->nullable();
            $table->string('seller_net_proceeds3')->nullable();

            $table->string('seller_actual_income1')->nullable();
            $table->string('seller_actual_income2')->nullable();
            $table->string('seller_actual_income3')->nullable();

            $table->string('seller_return_equity1')->nullable();
            $table->string('seller_return_equity2')->nullable();
            $table->string('seller_return_equity3')->nullable();

            $table->json('exchange_option_1')->nullable();
            $table->json('exchange_option_2')->nullable();
            $table->tinyInteger('is_skipped')->default(1);
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
        Schema::dropIfExists('marketing_exchange_options');
    }
}
