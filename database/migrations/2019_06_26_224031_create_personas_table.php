<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_documento')->unsigned()->nullable();
            $table->string('numero_documento');
            $table->integer('id_tipo_persona')->unsigned()->nullable();
            $table->string('primer_nombre',100)->nullable();
            $table->string('segundo_nombre',100)->nullable();
            $table->string('apellidos',150)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('telefono',10)->nullable();
            $table->integer('id_ciudad')->unsigned()->nullable();
            $table->dateTime('fecha_registro');
            $table->integer('id_usuario_registra')->unsigned()->nullable();
            $table->integer('estado');
            $table->foreign('id_tipo_persona')->references('id')->on('tipo_personas');
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documentos');
            $table->foreign('id_ciudad')->references('id')->on('ciudads');
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
        Schema::drop('personas');
    }
}
