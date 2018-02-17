<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclemovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclemovements', function (Blueprint $table) {
           
            $table->text('platenumber');
            $table->text('drivername');
            $table->text('initialkm');
            $table->text('finalkm');
            $table->text('differencekm');
            $table->text('movementdate');
            $table->text('Maker');
            $table->softDeletes('deleted_at');
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiclemovements');
    }
}
