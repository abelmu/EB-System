<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleservices', function (Blueprint $table) {
            $table->text('ordernumber');
            $table->text('platenumber');
            $table->text('garagename');
            $table->text('servicesmade');
          
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
        Schema::dropIfExists('vehicleservices');
    }
}
