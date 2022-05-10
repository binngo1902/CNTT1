<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_order_detail', function (Blueprint $table) {
            $table->id();
            $table->Integer('order_id');
            $table->string('product_id');
            $table->string('detail_product');
            $table->integer('price_buy');
            $table->integer('quantity');
            $table->string('shop_id');
            $table->integer('receiver_id');

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
        Schema::dropIfExists('mst_order_detail');
    }
}
