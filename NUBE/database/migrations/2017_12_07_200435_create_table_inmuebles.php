<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInmuebles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('condicion', ['alquiler', 'venta', 'alquiler/venta']);            
            $table->double('valorReal', 10, 2);
            $table->double('valorVenta', 10, 2);
            $table->double('valorAlquiler', 10, 2);
            $table->double('superficie', 10, 2);
            $table->string('direccion');
            $table->string('piso');
            $table->string('numDepto');            
            $table->date('fechaHabilitacion')->nullable();
            $table->string('linkVideo');
            $table->string('longitud');
            $table->string('latitud');
            $table->integer('cantidadAmbientes');
            $table->integer('cantidadBaños');
            $table->integer('cantidadGarages');
            $table->integer('cantidadDormitorios');
            $table->boolean('disponible');            
            $table->string('descripcion',500)->nullable();           
            $table->integer('edificio_id')->unsigned()->nullable();
            $table->foreign('edificio_id')->references('id')->on('edificios')->onDelete('cascade');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');
            $table->integer('barrio_id')->unsigned()->nullable();
            $table->foreign('barrio_id')->references('id')->on('barrios')->onDelete('cascade');
            $table->integer('localidad_id')->unsigned()->nullable();
            $table->foreign('localidad_id')->references('id')->on('localidades')->onDelete('cascade');
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
        Schema::dropIfExists('inmuebles');
    }
}
