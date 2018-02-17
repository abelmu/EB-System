<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityfuelorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cityfuelorders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
           
            $table->text('drivername');
            $table->text('fuelstation');
            $table->text('fueltype');
            $table->text('fuelconsumptioninlitter');
            $table->text('abysiniacard');
            $table->text('Maker');
            
            $table->softDeletes('deleted_at');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cityfuelorder');
    }
}
