<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->double('total');
            $table->enum('status',['PENDING_TO_CONFIRM','CONFIRMED','DELIVERED'])->default('PENDING_TO_CONFIRM');
            $table->integer('client_id');
            //$table->integer('cart_id');
            $table->timestamps();
            //Relation
            $table->foreign('client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            // $table->foreign('cart_id')->references('id')->on('carts')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
