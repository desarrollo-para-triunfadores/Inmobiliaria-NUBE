<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInmueblesCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles_caracteristicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('caracteristica_id')->unsigned();
            $table->foreign('caracteristica_id')->references('id')->on('caracteristicas')->onDelete('cascade');
            $table->integer('inmueble_id')->unsigned();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onDelete('cascade');
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
        Schema::dropIfExists('inmuebles_caracteristicas');
    }
}
