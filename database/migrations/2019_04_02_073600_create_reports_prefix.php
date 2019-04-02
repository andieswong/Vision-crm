<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsPrefix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_prefix', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('report');
            $table->integer('prefix_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('prefix_id')->references('id')->on('prefijos');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_prefix');
    }
}
