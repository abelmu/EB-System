<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields3ToTheVehicleinfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicleinfos', function (Blueprint $table) {
            //
             $table->text('abysiniacardused')->default('0');
              $table->text('abysiniacardremaining')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicleinfos', function (Blueprint $table) {
            //
        });
    }
}
