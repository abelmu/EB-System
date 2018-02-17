<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelorders', function (Blueprint $table) {
            $table->text('ordernumber');
            $table->text('platenumber');
            $table->text('drivername');
            $table->text('fuelstation');
            $table->text('fueltype');
            $table->text('currentfuellevel');
            $table->text('Maker');
            $table->increments('id');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('fuelorders');
    }
}
