<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTheVehicleservices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicleservices', function (Blueprint $table) {
            //
             $table->text('servicetype');
             $table->text('coveredby');
              $table->text('serviceinkm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicleservices', function (Blueprint $table) {
            //
        });
    }
}
