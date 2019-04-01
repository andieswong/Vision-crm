<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('comment');
            $table->integer('lead_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('lead_id')->references('id')->on('leads');
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
        Schema::dropIfExists('comments_leads');
    }
}
