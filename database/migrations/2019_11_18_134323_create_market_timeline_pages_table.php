<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketTimelinePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_timeline_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->default(0);
            $table->string('title')->nullable();
            $table->text('column1')->nullable();
            $table->text('column2')->nullable();
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
        Schema::dropIfExists('market_timeline_pages');
    }
}
