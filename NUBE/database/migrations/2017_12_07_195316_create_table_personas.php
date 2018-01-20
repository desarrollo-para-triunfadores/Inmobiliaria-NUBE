<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersonas extends Migration
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
            $table->string('nombre');
            $table->string('apellido');
            $table->enum('sexo', ['Femenino', 'Masculino']);
            $table->string('dni')->unique();
            $table->date('fecha_nac')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('email')->nullable();                        
            $table->string('foto_perfil')->nullable();
            $table->string('direccion')->nullable();
            $table->string('descripcion', 500)->nullable();
            $table->integer('localidad_id')->unsigned();
            $table->foreign('localidad_id')->references('id')->on('localidades')->onDelete('cascade');
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('paises')->onDelete('cascade');
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('personas');
    }
}
