<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion',500)->nullable();
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
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
        Schema::dropIfExists('caracteristicas');
    }
}
