<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->text('suppliercode');
            $table->text('suppliername');
            $table->text('telno1');
            $table->text('telno2');
            $table->text('fax');
            $table->text('pbox');
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
        Schema::dropIfExists('suppliers');
    }
}
