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

            $table->integer('contrato_id')->unsigned();
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');  

            $table->integer('rubrotecnico_id')->unsigned();
            $table->foreign('rubrotecnico_id')->references('id')->on('rubrosTecnicos')->onDelete('cascade');
            
            $table->enum('responsable', ['propietario', 'inquilino']);

            $table->string('motivo')->nullable(); 
            $table->enum('estado', ['inicial', 'tomada', 'concluida', 'finalizada']); //Estado Solicitud
            $table->double('monto_final', 10, 2)->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudesServicio');
    }
}
