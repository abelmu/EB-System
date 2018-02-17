<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddField2ToTheVehiclemovements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehiclemovements', function (Blueprint $table) {
            //
            $table->text('totalkm')->default('0');
            $table->text('movementdate')->default('2017-01-01');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiclemovements', function (Blueprint $table) {
            //
        });
    }
}
