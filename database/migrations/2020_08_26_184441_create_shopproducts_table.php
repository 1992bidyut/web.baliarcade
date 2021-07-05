<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopproducts', function (Blueprint $table) {
            $table->id();
            $table->integer('shopcategory_id');
            $table->integer('shop_id');
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('image');
            $table->string('price_en');
            $table->string('price_bn');
            $table->string('quantity_en');
            $table->string('quantity_bn');
            $table->string('discount_en')->nullable();
            $table->string('discount_bn')->nullable();
            $table->string('size_en')->nullable();
            $table->string('size_bn')->nullable();
            $table->string('color_en')->nullable();
            $table->string('color_bn')->nullable();
            $table->string('warranty_en')->nullable();
            $table->string('warranty_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('rating')->nullable();
            $table->string('buying_date')->nullable();
            $table->string('expire_date')->nullable();
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
        Schema::dropIfExists('shopproducts');
    }
}
