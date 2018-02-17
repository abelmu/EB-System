<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFueltypeandpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fueltypeandprices', function (Blueprint $table) {
            $table->text('fuelcode');
            $table->text('fueltype');
            $table->text('fuelprice');
            $table->text('Maker');
            $table->increments('id');
            $table->timestamps();
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
        Schema::dropIfExists('fueltypeandprices');
    }
}
