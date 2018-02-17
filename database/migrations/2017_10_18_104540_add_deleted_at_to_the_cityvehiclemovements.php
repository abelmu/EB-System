<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedAtToTheCityvehiclemovements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cityvehiclemovements', function (Blueprint $table) {
            //
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
        Schema::table('cityvehiclemovements', function (Blueprint $table) {
            //
            Schema::dropIfExists('cityvehiclemovements');
        });
    }
}
