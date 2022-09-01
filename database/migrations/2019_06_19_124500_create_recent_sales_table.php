<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecentSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('closing_date')->nullable();
            $table->json('units')->nullable();
            $table->integer('total_units')->nullable();
            $table->string('price_per_unit')->nullable();
            $table->string('year_built')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('price_per_sf')->nullable();
            $table->string('cap_rate')->nullable();
            $table->string('grm')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('recent_sales');
    }
}
