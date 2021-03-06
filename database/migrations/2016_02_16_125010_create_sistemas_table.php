<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('sistemas');
        Schema::create('sistemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_sistema');
            $table->string('imagen_sistema');
            $table->string('controlador');
            $table->string('funcion',20);
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
        Schema::drop('sistemas');
    }
}