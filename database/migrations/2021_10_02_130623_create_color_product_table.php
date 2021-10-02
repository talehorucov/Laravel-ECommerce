<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductTable extends Migration
{
    public function up()
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
            $table->foreignId('color_id')->constrained();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('product_color');
    }
}
