<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','128');
            $table->string('direccion');
            $table->string('telephone','128');
            $table->string('latitude');
            $table->string('longitude');
            $table->enum('bhabilitado',['ENABLE','DISABLE'])->default('ENABLE');
            $table->integer('organization_id');
            $table->timestamps();
            //relations
            $table->foreign('organization_id')->references('id')->on('organizations')
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
        Schema::dropIfExists('branches');
    }
}
