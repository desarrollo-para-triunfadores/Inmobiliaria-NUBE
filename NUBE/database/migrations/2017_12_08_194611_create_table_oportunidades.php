<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOportunidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_interesado');         
            $table->string('telefono')->nullable();
            $table->string('mensaje')->nullable();
            $table->string('email')->nullable();                                  
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados_oportunidades')->onDelete('cascade');
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onDelete('cascade');
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
        Schema::dropIfExists('oportunidades');
    }
}
