<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeProductTable extends Migration
{
    public function up()
    {
        Schema::create('size_product', function (Blueprint $table) {
            $table->foreignId('size_id')->constrained();
            $table->foreignId('product_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('size_product');
    }
}
