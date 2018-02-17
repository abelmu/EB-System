<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclehandoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclehandovers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
           $table->text('fbumber')->default('Not available'); 
            $table->text('rbumber')->default('Not available'); 
             $table->text('door')->default('Not available'); 
              $table->text('lhshlamp')->default('Not available'); 
               $table->text('rhshlamp')->default('Not available'); 


              $table->text('lhsslight')->default('Not available'); 
            $table->text('rhsslight')->default('Not available'); 
             $table->text('rlights')->default('Not available'); 
              $table->text('outdoorhandler')->default('Not available'); 
               $table->text('glass')->default('Not available'); 


                    $table->text('lhsovmirror')->default('Not available'); 
            $table->text('rhsovmirror')->default('Not available'); 
             $table->text('rainwipper')->default('Not available'); 
              $table->text('dipstick')->default('Not available'); 
               $table->text('mudguard')->default('Not available'); 



                    $table->text('rimtype')->default('Not available'); 
            $table->text('gage')->default('Not available'); 
            $table->text('swithes')->default('Not available'); 
             $table->text('hazardswithe')->default('Not available'); 
             $table->text('lightswitch')->default('Not available'); 
              $table->text('tape')->default('Not available'); 
               $table->text('belt')->default('Not available'); 

                 $table->text('headrest')->default('Not available'); 
            $table->text('insidedoorlock')->default('Not available'); 
             $table->text('ashetree')->default('Not available'); 
              $table->text('seatcondition')->default('Not available'); 
             $table->text('numofwrench')->default('Not available'); 
              $table->text('flsidetyretype')->default('Not available'); 
               $table->text('frsidetyretype')->default('Not available'); 

               $table->text('rlsidetyretype')->default('Not available'); 
            $table->text('rrsidetyretype')->default('Not available'); 
             $table->text('standjack')->default('Not available'); 
              $table->text('tyrewrench')->default('Not available'); 
               $table->text('jackpicker')->default('Not available'); 

               $table->text('sparetyre')->default('Not available'); 

               $table->text('platenumber')->default('Not available'); 
              $table->text('condition')->default('Not available'); 

               $table->text('chasisnumber')->default('Not available'); 
              $table->text('motornumber')->default('Not available'); 
              $table->text('serviceinkm')->default('Not available'); 
               $table->text('employeename')->default('Not available'); 
              
               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiclehandovers');
    }
}
