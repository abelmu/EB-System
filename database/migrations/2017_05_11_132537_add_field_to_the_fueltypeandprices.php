<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToTheFueltypeandprices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuelorders', function (Blueprint $table) {
            //
            $table->text('cost');
             $table->text('orderdate');
            
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
             $table->dropColumn(['cost','orderdate']);
        });
    }
}
