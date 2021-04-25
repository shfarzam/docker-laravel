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
        Schema::enableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('order_id');
            $table->bigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->change();
            $table->bigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products')->change();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['order_id', 'customer_id', 'product_id']);

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
