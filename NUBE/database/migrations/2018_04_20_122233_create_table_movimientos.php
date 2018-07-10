<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_hora');
            $table->enum('tipo_movimiento', ['entrada', 'salida']);
            $table->double('monto', 10, 2);
            $table->string('descripcion')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->integer('inquilino_id')->unsigned()->nullable();
            $table->foreign('inquilino_id')->references('id')->on('inquilinos')->onDelete('cascade'); 
            $table->integer('tecnico_id')->unsigned()->nullable();
            $table->foreign('tecnico_id')->references('id')->on('tecnicos')->onDelete('cascade'); 
            $table->integer('propietario_id')->unsigned()->nullable();
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');     
            $table->integer('liquidacion_id')->unsigned()->nullable();
            $table->foreign('liquidacion_id')->references('id')->on('liquidaciones_mensuales')->onDelete('cascade');                     
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
        Schema::dropIfExists('movimientos');
    }
}
