<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mensaje',500)->nullable();
            $table->enum('tipo', ['agenda', 'oportunidad','pago', 'vencimiento', 'confirmacion_visita', 'visita', 'calificacion', 'visita_del_dia']);
            $table->boolean('estado_leido')->nullable();
            $table->boolean('ocultar')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->integer('visita_id')->unsigned()->nullable();
            $table->foreign('visita_id')->references('id')->on('visitas')->onDelete('cascade'); 
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
        Schema::dropIfExists('notificaciones');
    }
}
