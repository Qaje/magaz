<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('email_verification');
            $table->integer('sexo');
            $table->string('celnumber');
            $table->enum('bhabilitado',['ENABLE','DISABLE'])->default('ENABLE');
            $table->integer('rol_id')->unsigned();
            $table->timestamps();

            //rELATIONS
            $table->foreign('rol_id')->references('id')->on('rols')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
