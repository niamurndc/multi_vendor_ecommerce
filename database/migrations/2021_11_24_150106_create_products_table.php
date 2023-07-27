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
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->decimal('price');
            $table->decimal('offprice')->nullable();
            $table->integer('qty');
            $table->string('image');
            $table->text('desc')->nullable();
            $table->text('tags')->nullable();
            $table->json('size')->nullable();
            $table->json('color')->nullable();
            $table->string('campaign')->nullable();
            $table->string('discount')->nullable();
            $table->integer('status')->default(0);
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('seller_id');
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
        Schema::dropIfExists('products');
    }
}
