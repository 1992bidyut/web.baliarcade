<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->string('name');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');
            $table->string('order_status')->default(0);
            $table->string('payment_by')->nullable();
            $table->string('order_type')->nullable();
            $table->string('pay')->nullable();
            $table->string('due')->nullable();
            $table->string('total_quantity')->nullable();
            $table->string('total')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('restaurant_id')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->string('shipping_addr')->nullable();
            $table->string('product_id')->nullable();
            $table->string('menu_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
