<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTheUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->text('suppliers')->default('No');
             $table->text('garages')->default('No');
              $table->text('fuelstations')->default('No');
            $table->text('fuelprices')->default('No');


             $table->text('vehicletypes')->default('No');
            $table->text('newvehicleinfos')->default('No');
              $table->text('userregisters')->default('No');
            $table->text('rolesdef');


             $table->text('fuelorders')->default('No');
            $table->text('vehiclesevices')->default('No');
              $table->text('reports')->default('No');
            $table->text('vehiclemovements')->default('No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
