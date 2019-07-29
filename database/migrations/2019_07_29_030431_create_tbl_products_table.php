<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('manufacture_id');
            $table->longText('product_short_description');
            $table->longText('product_long_description');
            $table->float('product_price');
            $table->string('pruduct_image');
            $table->string('pruduct_size');
            $table->string('pruduct_color');
            $table->integer('pulished_status');
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
        Schema::dropIfExists('tbl_products');
    }
}
