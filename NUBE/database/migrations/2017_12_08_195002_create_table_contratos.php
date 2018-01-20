<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo_renta', ['fija', 'creciente']);
            $table->integer('periodos')->nullable();
            $table->date('fecha_desde')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->double('incremento', 10, 2)->nullable();
            $table->double('comision_propietario', 10, 2)->nullable();
            $table->double('comision_inquilino', 10, 2)->nullable();
            $table->double('monto_basico', 10, 2)->nullable();
            $table->boolean('sujeto_a_gastos_compartidos')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('inquilino_id')->unsigned()->nullable();
            $table->foreign('inquilino_id')->references('id')->on('inquilinos')->onDelete('cascade');
            $table->integer('inmueble_id')->unsigned()->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onDelete('cascade');
            $table->integer('garante_id')->unsigned()->nullable();
            $table->foreign('garante_id')->references('id')->on('garantes')->onDelete('cascade');
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
        Schema::dropIfExists('contratos');
    }
}

