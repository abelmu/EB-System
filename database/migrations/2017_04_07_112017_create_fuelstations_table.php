<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelstations', function (Blueprint $table) {
            $table->text('stationcode');
            $table->text('stationname');
            $table->text('stationtype');
            $table->text('city');
            $table->text('woreda');
            $table->string('Maker');
            $table->increments('id');
            $table->timestamps();
             $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuelstations');
    }
}
