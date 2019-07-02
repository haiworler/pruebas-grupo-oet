<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->string('color');
            $table->integer('id_marca')->unsigned()->nullable();
            $table->integer('id_tipovehiculo')->unsigned()->nullable();
            $table->integer('id_conductor')->unsigned()->nullable();
            $table->integer('id_propietario')->unsigned()->nullable();
            $table->dateTime('fecha_registro');
            $table->integer('id_usuario_registra')->unsigned()->nullable();
            $table->foreign('id_marca')->references('id')->on('marcas');
            $table->foreign('id_tipovehiculo')->references('id')->on('tipo_vehiculos');
            $table->foreign('id_conductor')->references('id')->on('personas');
            $table->foreign('id_propietario')->references('id')->on('personas');
            $table->foreign('id_usuario_registra')->references('id')->on('users');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculos');
    }
}
