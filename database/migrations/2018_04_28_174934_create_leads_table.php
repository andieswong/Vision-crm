<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('tel');
            $table->string('tel_adic');
            $table->string('fecha_nac');
            $table->string('ssn');
            $table->string('card');
            $table->string('exp');
            $table->string('code');
            $table->string('paq_ofrecido');
            $table->string('tvs_inst');
            $table->string('dvr');
            $table->string('horario_inst');
            $table->string('descuento');
            $table->string('servicios_adic');
            $table->string('compania_act');
            $table->string('cod');
            $table->string('notas');
            $table->string('estado_lead');
            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('leads');
    }
}
