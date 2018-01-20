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
            $table->double('alquiler', 10, 2)->nullable();
            $table->timestamp('fecha_pago')->nullable();
            $table->date('vencimiento')->nullable();
            $table->double('total', 10, 2)->nullable();
            $table->double('subtotal', 10, 2)->nullable();
            $table->double('saldo_periodo', 10, 2)->nullable();
            $table->boolean('abono')->nullable(); 
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
