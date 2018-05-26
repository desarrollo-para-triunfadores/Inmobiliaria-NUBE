<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVisitas extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id');

            /*             * Variables ajustadas para su uso con el plugin calendar */
            $table->string('title')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->boolean('allDay')->nullable();
            $table->string('backgroundColor')->nullable();
            $table->string('borderColor')->nullable();

            /*
             * Resto de variables
             */
            
            $table->string('observacion', 2000)->nullable();
            $table->integer('confirmada')->unsigned()->nullable();
            $table->integer('realizada')->unsigned()->nullable();
            $table->integer('oportunidad_id')->unsigned()->nullable();
            $table->foreign('oportunidad_id')->references('id')->on('oportunidades')->onDelete('cascade');
            $table->integer('solicitudservicio_id')->unsigned()->nullable();
            $table->foreign('solicitudservicio_id')->references('id')->on('solicitudesServicio')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('visitas');
    }

}
