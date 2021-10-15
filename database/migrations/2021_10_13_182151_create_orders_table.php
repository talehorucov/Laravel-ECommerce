<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->text('address'); 
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('post_code')->nullable();
            $table->text('note')->nullable();
            $table->string('order_number')->default('000000001');
            $table->string('coupon')->nullable();
            $table->string('discount')->nullable();
            $table->float('amount',8,2); 
            $table->float('discount_amount',8,2)->nullable();
            $table->string('confirmed_date')->nullable();
            $table->string('processing_date')->nullable();
            $table->string('picked_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('return_reason')->nullable();
            $table->string('status');            
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}