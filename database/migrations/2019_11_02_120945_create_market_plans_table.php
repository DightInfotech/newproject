<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('section_cover')->nullable();
            $table->text('column1')->nullable();
            $table->text('column2')->nullable();
            $table->text('column3')->nullable();
            $table->text('column4')->nullable();
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
        Schema::dropIfExists('market_plans');
    }
}
