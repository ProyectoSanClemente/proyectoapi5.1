<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cuentas');
        Schema::dropIfExists('impresoras');
        Schema::dropIfExists('comentarios');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('conversations');
        Schema::dropIfExists('usuarios');
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accountname',25)->unique();
            $table->string('rut',25)->nullable();
            $table->string('nombre',25)->nullable();
            $table->string('apellido',25)->nullable();
            $table->string('displayname',45)->nullable();
            $table->string('email',100)->nullable();
            $table->string('rol',10);
            $table->string('imagen',100);
            $table->string('password',100);
            $table->string('remember_token',100);
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
