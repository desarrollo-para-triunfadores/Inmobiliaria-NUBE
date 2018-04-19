<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo')->nullable();
            $table->dateTime('inicio')->nullable();
            $table->dateTime('fin')->nullable();
            $table->boolean('allDay')->nullable();
            $table->string('color')->nullable();

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
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
