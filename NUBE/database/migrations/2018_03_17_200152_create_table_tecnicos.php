<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTecnicos extends Migration
{
    public function up()
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rubroTecnico_id')->unsigned()->nullable();
            $table->foreign('rubroTecnico_id')->references('id')->on('rubrosTecnicos')->onDelete('cascade'); 
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tecnicos');
    }
}
