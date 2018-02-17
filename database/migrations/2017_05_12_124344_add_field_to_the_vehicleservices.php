<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToTheVehicleservices extends Migration
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
             $table->text('cost');
             $table->text('fromdate');
              $table->text('uptodate');
             $table->text('drivername');
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
              $table->dropColumn(['cost','fromdate','uptodate','drivername']);
        });
    }
}
