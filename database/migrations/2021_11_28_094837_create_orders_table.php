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
            $table->integer('address_id');
            $table->integer('user_id');
            $table->string('note')->nullable();
            $table->integer('status')->default(0);
            $table->decimal('total');
            $table->decimal('charge');
            $table->decimal('subtotal');
            $table->string('trackid');
            $table->integer('currier_id');
            $table->integer('seller_id');
            $table->string('method');
            $table->integer('comission')->default(0);
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
