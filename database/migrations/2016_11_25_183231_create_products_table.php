<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->text('description');
            $table->string('builder_code');
            $table->string('pronto_code');
            $table->string('image')->nullable();
            $table->string('image_3d')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('manufacturing_product_code');
            $table->integer('builders_price');
            $table->integer('sales_price');
            $table->integer('discount');
            $table->integer('quantity');
            $table->integer('energy_consumption');
            $table->softDeletes();
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
        Schema::drop('products');
    }
}
