<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContratosPeriodos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inicio_periodo')->unsigned();
            $table->integer('fin_periodo')->unsigned();
            $table->double('monto_fijo', 10, 2)->nullable();
            $table->double('monto_incremental', 10, 2)->nullable();
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
        Schema::dropIfExists('contratos_periodos');
    }
}
