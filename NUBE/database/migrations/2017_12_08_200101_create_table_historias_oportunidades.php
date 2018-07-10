<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoriasOportunidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historias_oportunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');             
            $table->string('detalle')->nullable();
            $table->string('estado_previo')->nullable();
            $table->string('estado_actual')->nullable();                                  
            $table->dateTime('fecha')->nullable();
            $table->boolean('cambio_estado')->nullable();  
            $table->integer('oportunidad_id')->unsigned()->nullable();
            $table->foreign('oportunidad_id')->references('id')->on('inmuebles')->onDelete('cascade');        
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
        Schema::dropIfExists('historias_oportunidades');
    }
}
