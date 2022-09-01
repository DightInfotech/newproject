<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemorandumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memorandums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('property_title')->nullable();
            $table->text('property_full_address')->nullable();
            $table->string('cover_page_image')->nullable();
            $table->string('subject_property_thumbnail')->nullable();
            $table->text('text')->nullable();
            $table->text('footer')->nullable();
            $table->string('business_card_1')->nullable();
            $table->string('business_card_2')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('memorandum');
    }
}
