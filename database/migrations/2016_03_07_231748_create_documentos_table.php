<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');            
            $table->text('nombre');
            $table->text('documento');
            $table->integer('id_repositorio')->unsigned();
            $table->foreign('id_repositorio')->references('id')->on('repositorios  ')->onDelete('cascade');
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
        Schema::drop('documentos');
    }
}
