<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetalleMensajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_users_mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mensaje_id')->unsigned();
            $table->foreign('mensaje_id')->references('id')->on('mensajes')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('leido')->nullable();
            $table->boolean('enviado')->nullable();
            $table->boolean('destacado')->nullable();
            $table->boolean('papelera')->nullable();
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
        //
    }
}
