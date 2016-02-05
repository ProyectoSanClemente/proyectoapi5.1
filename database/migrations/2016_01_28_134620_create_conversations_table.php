<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('conversations');
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user1_id')->unsigned();
            $table->string('user1_accountname',25);
            $table->integer('user2_id')->unsigned();
            $table->string('user2_accountname',25);            
            $table->foreign('user1_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('user2_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('unseen')->default(0);
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
