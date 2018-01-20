<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEdificios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edificios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->string('longitud')->nullable();
            $table->string('latitud')->nullable();
            $table->boolean('administrado_por_sistema')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->boolean('cochera')->nullable();
            $table->integer('cant_ascensores')->nullable();
            $table->integer('cant_deptos')->nullable();
            $table->double('costo_sueldos_personal', 10, 2)->nullable();
            $table->double('valor_ascensores', 10, 2)->nullable();
            $table->double('costo_mant_ascensores', 10, 2)->nullable();
            $table->double('costo_limpieza', 10, 2)->nullable();
            $table->double('costo_seguro', 10, 2)->nullable();
            $table->date('fecha_habilitacion')->nullable();
            $table->string('descripcion', 500)->nullable();
            $table->integer('barrio_id')->unsigned()->nullable();
            $table->foreign('barrio_id')->references('id')->on('barrios')->onDelete('cascade');
            $table->integer('localidad_id')->unsigned();
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
        Schema::dropIfExists('edificios');
    }
}
