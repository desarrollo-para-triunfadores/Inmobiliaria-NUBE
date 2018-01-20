<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePropietarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',500)->nullable();
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');                       
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
        Schema::dropIfExists('propietarios');
    }
}
