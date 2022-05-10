<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_order', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('order_shop');
            $table->integer('customer_id');
            $table->integer('total_price');
            $table->tinyInteger('payment_method');
            $table->integer('ship_charge');
            $table->integer('tax');
            $table->dateTime('order_date');
            $table->dateTime('shipment_date');
            $table->dateTime('cancel_date');
            $table->string('note_customer')->nullable();
            $table->string('error_code_api')->nullable();


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
        Schema::dropIfExists('mst_order');
    }
}
