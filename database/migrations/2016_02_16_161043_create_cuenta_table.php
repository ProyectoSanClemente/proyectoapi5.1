<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cuentas');
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_sidam',25);
            $table->string('pass_sidam',25);
            $table->string('id_crecic',25);
            $table->string('pass_crecic',25);
            $table->string('id_owncloud',25);
            $table->string('pass_owncloud',25);
            $table->string('id_solicitudcompras',25);
            $table->string('pass_solicitudcompras',25);
            $table->string('id_zimbra',25);
            $table->string('pass_zimbra',25);
            $table->string('id_boleta',25);
            $table->string('pass_boleta',25);
            $table->string('id_garantia',25);
            $table->string('pass_garantia',25);
            $table->string('id_bodega',25);
            $table->string('pass_bodega',25);
             $table->string('id_social',25);
            $table->string('pass_social',25);
            $table->string('id_plan',25);
            $table->string('pass_plan',25);

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::drop('cuentas');
    }
}
