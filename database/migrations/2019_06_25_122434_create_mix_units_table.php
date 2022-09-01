<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMixUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('number_of_units')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('sq_feet')->nullable();
            $table->string('current_rents')->nullable();
            $table->string('rent_per_sf')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('proforma_rents')->nullable();
            $table->string('rent_per_sf2')->nullable();
            $table->string('monthly_income2')->nullable();

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
        Schema::dropIfExists('mix_units');
    }
}
