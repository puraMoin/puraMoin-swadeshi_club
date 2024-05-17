<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('name', 45)->nullable();
            $table->string('page_title', 45)->nullable();
            $table->string('page_slug', 45)->nullable();
            $table->string('canonical_url', 255)->nullable();    
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('display_home_page')->default(0);
            $table->string('image_file', 45)->nullable();
            $table->string('meta_title', 45)->nullable();
            $table->longText('meta_description')->nullable();
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
        Schema::dropIfExists('product_types');
    }
}
