<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConceptosLiquidacionesMensuales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos_liquidaciones_mensuales', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto', 10, 2)->nullable();
            $table->string('periodo')->nullable();
            $table->date('primer_vencimiento')->nullable();
            $table->date('segundo_vencimiento')->nullable();
            $table->boolean('servicio_abonado')->nullable();
            $table->integer('liquidacion_mensual_id')->unsigned()->nullable();
            $table->foreign('liquidacion_mensual_id')->references('id')->on('liquidaciones_mensuales')->onDelete('cascade');
            $table->integer('servicio_contrato_id')->unsigned()->nullable();
            $table->foreign('servicio_contrato_id')->references('id')->on('contratos_servicios')->onDelete('cascade');

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
        Schema::dropIfExists('conceptos_liquidaciones_mensuales');
    }
}
