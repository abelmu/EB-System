<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTheVehiclehandovers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehiclehandovers', function (Blueprint $table) {
            //
            $table->text('vehicletype')->default('0');
            $table->text('vehiclemodel')->default('0');
            $table->text('vehicleprice')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiclehandovers', function (Blueprint $table) {
            //
        });
    }
}
