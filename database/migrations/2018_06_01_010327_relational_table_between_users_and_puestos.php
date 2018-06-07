<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelationalTableBetweenUsersAndPuestos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('puesto_id')->unsigned();

            $table->primary(['user_id', 'puesto_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('puesto_id')->references('id')->on('puestos');
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
        Schema::dropIfExists('puestos_users');
    }
}
