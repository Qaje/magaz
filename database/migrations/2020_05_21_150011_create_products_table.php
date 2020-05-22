<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('quantity');
            $table->enum('status',['AVALIABLE','MISSING'])->default('AVALIABLE');
            $table->integer('transaction_id');
            $table->integer('category_id');
            $table->integer('cart_id');
            $table->timestamps();
                        //Relation
            $table->foreign('transaction_id')->references('id')->on('transactions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('cart_id')->references('id')->on('carts')
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
        Schema::dropIfExists('products');
    }
}
