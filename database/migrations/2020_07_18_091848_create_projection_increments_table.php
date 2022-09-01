<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectionIncrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projection_increments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('memorandum_id')->default(0);
            $table->integer('year')->default(0);
            $table->string('market_rents')->nullable();
            $table->string('loss_to_lease')->nullable();
            $table->string('vacancy_loss')->nullable();
            $table->string('concessions')->nullable();
            $table->string('non_revenue_units')->nullable();
            $table->string('other_income')->nullable();
            $table->string('total_operating_expenses')->nullable();
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
        Schema::dropIfExists('projection_increments');
    }
}
