<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationalTableUserLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_leads', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('followed_id')->unsigned();

            $table->primary(['user_id', 'followed_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('leads');
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
        Schema::dropIfExists('user_leads');
    }
}
