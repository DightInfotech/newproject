<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->unsigned();
            $table->string('cover_page_1')->nullable();
            $table->text('column1')->nullable();
            $table->text('column2')->nullable();
            $table->text('column3')->nullable();
            $table->text('invest_highlights1')->nullable();
            $table->text('invest_highlights2')->nullable();
            $table->string('highlights_image1')->nullable();
            $table->string('highlights_image2')->nullable();
            $table->string('highlights_image3')->nullable();
            $table->string('highlights_image4')->nullable();
            $table->string('parcel_number')->nullable();
            $table->string('zoning')->nullable();
            $table->string('type_of_ownership')->nullable();
            $table->string('density_units_per_acre')->nullable();
            $table->string('parking')->nullable();
            $table->string('parking_ratio')->nullable();
            $table->string('landscaping')->nullable();
            $table->string('topography')->nullable();
            $table->string('water')->nullable();
            $table->string('electric')->nullable();
            $table->string('gas')->nullable();
            $table->string('foundation')->nullable();
            $table->string('framing')->nullable();
            $table->string('exterior')->nullable();
            $table->string('parking_surface')->nullable();
            $table->string('roof')->nullable();
            $table->string('hvac')->nullable();
            $table->text('loc_amenities')->nullable();
            $table->text('unit_amenities')->nullable();
            $table->string('amenity_image1')->nullable();
            $table->string('amenity_image2')->nullable();
            $table->string('amenity_image3')->nullable();
            $table->string('plat_map1')->nullable();
            $table->string('plat_map2')->nullable();
            $table->string('area_map1')->nullable();
            $table->string('area_map2')->nullable();
            $table->string('arial_image1')->nullable();
            $table->string('arial_image2')->nullable();



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
        Schema::dropIfExists('property_descriptions');
    }
}
