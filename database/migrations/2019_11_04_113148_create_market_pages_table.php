<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->integer('page_number')->default(0);
            $table->string('template')->nullable();
            $table->json('recent_sale_ids')->nullable();
            $table->json('rent_comparable_ids')->nullable();
            $table->json('market_comparable_ids')->nullable();
            $table->json('gallery_ids')->nullable();
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
        Schema::dropIfExists('market_pages');
    }
}
