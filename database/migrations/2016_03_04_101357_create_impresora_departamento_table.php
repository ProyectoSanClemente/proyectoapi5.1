<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpresoraDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('impresora_departamento');
        Schema::create('impresora_departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_impresora')->unsigned();
            $table->foreign('id_impresora')->references('id')->on('impresoras')->onDelete('cascade');
            $table->integer('id_departamento')->unsigned();
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onDelete('cascade');
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
        Schema::drop('impresora_departamento');
    }
}
