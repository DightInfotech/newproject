<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketComparableFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_comparable_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('section_cover')->nullable();
            $table->string('map_image')->nullable();
            $table->text('map_subjects')->nullable();
            $table->string('avg_cap_rate')->nullable();
            $table->string('avg_grm_rate')->nullable();
            $table->string('avg_price_sf')->nullable();
            $table->string('avg_price_unit')->nullable();
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
        Schema::dropIfExists('market_comparable_fields');
    }
}
