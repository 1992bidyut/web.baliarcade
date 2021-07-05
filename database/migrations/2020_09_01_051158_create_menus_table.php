<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('menucategory_id');
            $table->integer('restaurantcategory_id');
            $table->integer('restaurant_id');
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('image');
            $table->string('price_en');
            $table->string('price_bn');
            $table->string('discount_en')->nullable();
            $table->string('discount_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('menus');
    }
}
