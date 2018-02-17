<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->text('garagecode');
            $table->text('garagename');
            $table->text('garagetelno');
            $table->text('city');
            $table->text('woreda');
            $table->string('Maker');
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
        Schema::dropIfExists('garage');
    }
}
