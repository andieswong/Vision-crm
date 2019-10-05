<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefijosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefijos', function (Blueprint $table) {
            $table->integer('pre')->unsigned();
            $table->integer('usuario')->unsigned();



            $table->foreign('usuario')->references('id')->on('users')->change();
            $table->foreign('pre')->references('id')->on('pres');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefijos');
    }
}
