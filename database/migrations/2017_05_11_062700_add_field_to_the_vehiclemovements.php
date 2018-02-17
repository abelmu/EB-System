<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToTheVehiclemovements extends Migration
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
            $table->text('startingtime');
             $table->text('endtime');
              $table->text('initialposition');
               $table->text('finalposition');
                $table->text('reqdepartment');
                 $table->text('numberofpeople')->nullabele();
                  $table->text('package')->default();
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
            $table->dropColumn(['startingtime','endtime','initialposition'
                ,'finalposition','reqdepartment','numberofpeople','package']);
        });
    }
}
