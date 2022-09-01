<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketComparableGraphs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_comparable_graphs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->default(0);
            $table->string('page_title')->nullable();
            $table->string('graph_title')->nullable();
            $table->string('graph_label')->nullable();
            $table->string('y_axis')->nullable();
            $table->string('x_axis')->nullable();
            $table->string('graph_values')->nullable();
            $table->string('avg_value')->nullable();
            $table->string('graph_image')->nullable();
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
        Schema::dropIfExists('market_comparable_graphs');
    }
}
