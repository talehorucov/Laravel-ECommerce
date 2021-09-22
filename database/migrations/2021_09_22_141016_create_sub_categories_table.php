<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name_eng');
            $table->string('name_aze');
            $table->string('slug_eng');
            $table->string('slug_aze');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}