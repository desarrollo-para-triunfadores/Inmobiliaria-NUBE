<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContratosServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contrato_id')->unsigned()->nullable();
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $table->integer('servicio_id')->unsigned()->nullable();
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
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
        Schema::dropIfExists('contratos_servicios');
    }
}
