<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('subsubcategory_id');
            $table->string('name_eng');
            $table->string('name_aze');
            $table->string('slug_eng');
            $table->string('slug_aze');
            $table->string('code');
            $table->integer('quantity');
            $table->string('tags_eng');
            $table->string('tags_aze');
            $table->string('size_eng')->nullable();
            $table->string('size_aze')->nullable();
            $table->string('color_eng');
            $table->string('color_aze');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_desc_eng');
            $table->string('short_desc_aze');
            $table->text('long_desc_eng');
            $table->text('long_desc_aze');
            $table->string('thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deal')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();


            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('subsubcategory_id')->references('id')->on('sub_sub_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
