<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpresorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('impresoras');
        Schema::create('impresoras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo_impresora');
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
        Schema::drop('impresoras');
    }
}
