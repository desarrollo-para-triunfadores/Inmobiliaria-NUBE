<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSolicitudesServicio extends Migration
{
    public function up()
    {
        Schema::create('solicitudesServicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tecnico_id')->unsigned()->nullable();
            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onDelete('cascade'); 

            $table->integer('inquilino_id')->unsigned();
            $table->foreign('inquilino_id')->references('id')->on('inquilinos')->onDelete('cascade');   
            $table->integer('propietario_id')->unsigned();
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');                     
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudesServicio');
    }
}
