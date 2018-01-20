<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInmueblesImagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles_imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->enum('seccion_imagen', ['slider','portada','planoMin','planoMax','detalle'])->nullable();
            $table->integer('inmueble_id')->unsigned()->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onDelete('cascade');
            $table->integer('espacio_id')->unsigned()->nullable();
            $table->foreign('espacio_id')->references('id')->on('espacios')->onDelete('cascade');
            $table->integer('proyecto_id')->unsigned()->nullable();
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');            
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
        Schema::dropIfExists('inmuebles_imagenes');
    }
}
