<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecentSaleFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_sale_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('section_cover')->nullable();
            $table->string('map_image')->nullable();
            $table->text('map_subjects')->nullable();
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
        Schema::dropIfExists('recent_sale_fields');
    }
}
