<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFields1ToTheFuelorders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuelorders', function (Blueprint $table) {

            $table->text('totallitter')->default('0');
              $table->text('totalbirr')->default('0');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fuelorders', function (Blueprint $table) {
            //
        });
    }
}
