<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn');
            $table->integer('restaurantcategory_id');
            $table->integer('floor_id');
            $table->string('phone_en');
            $table->string('phone_bn');
            $table->string('open')->nullable();
            $table->string('image');
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('owner_en')->nullable();
            $table->string('owner_bn')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
