<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbysiniacardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abysiniacards', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
             $table->string('Maker');
            $table->text('platenumber');
            $table->text('price');
           $table->text('date');
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
        Schema::dropIfExists('abysiniacards');
    }
}
