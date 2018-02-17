<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleinfos', function (Blueprint $table) {
            $table->text('platenumber');
            $table->text('vehicletype');
            $table->text('enginesize');
            $table->text('servicekm');
            $table->text('vehiclemodel');
            $table->text('chasisnumber');
            $table->text('datebaought');
            $table->text('suppliername');
            $table->text('drivername');
            $table->text('vehicleprice');
            $table->text('fuelcap');
            $table->text('wheelbase');
            $table->text('tyresize');
            $table->text('numofdoors');
            $table->text('fueltype');
            $table->text('radiocassete');
            $table->text('airconditionare');
             $table->text('Maker');
             $table->softDeletes('deleted_at');
            $table->increments('id');
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
        Schema::dropIfExists('vehicleinfos');
    }
}
