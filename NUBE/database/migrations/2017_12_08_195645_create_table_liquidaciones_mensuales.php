<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLiquidacionesMensuales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidaciones_mensuales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periodo')->nullable();
            $table->double('alquiler', 10, 2)->nullable();
            $table->double('gastos_administrativos', 10, 2)->nullable();
            $table->double('comision_a_propietario', 10, 2)->nullable();
            $table->date('vencimiento')->nullable();
            $table->double('total', 10, 2)->nullable();
            $table->double('subtotal', 10, 2)->nullable();
            $table->double('saldo_periodo', 10, 2)->nullable();
            $table->double('abonado', 10, 2)->nullable();
            $table->dateTime('fecha_cobro_inquilino')->nullable();
            $table->dateTime('fecha_pago_propietario')->nullable();
            $table->dateTime('fecha_cobro_propietario')->nullable();            
            $table->integer('contrato_id')->unsigned()->nullable();
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
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
        Schema::dropIfExists('liquidaciones_mensuales');
    }
}
