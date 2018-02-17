<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityvehiclemovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cityvehiclemovements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('platenumber');
            $table->text('drivername');
            $table->text('initialkm');
            $table->text('finalkm');
            $table->text('differencekm');
            $table->text('movementdate');
            $table->text('Maker');
            $table->text('startingtime');
             $table->text('endtime');
              $table->text('initialposition');
               $table->text('finalposition');
                $table->text('reqdepartment');
               
                 $table->text('numberofpeople')->nullabele('0');
                  $table->text('package')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cityvehiclemovements');
    }
}
