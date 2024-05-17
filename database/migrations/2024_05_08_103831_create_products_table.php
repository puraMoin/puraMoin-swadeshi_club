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
            $table->string('product_code', 255)->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('price', 255)->nullable();
            $table->tinyInteger('in_stock')->default(0);
            $table->tinyInteger('display_home_page')->default(0);
            $table->text('description')->nullable();
            $table->text('spefication')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('is_offer_applicable')->default(0);
            $table->tinyInteger('apply_tax')->default(0);
            $table->string('tax_value', 255)->nullable();
            $table->string('page_title', 45)->nullable();
            $table->string('page_slug', 45)->nullable();
            $table->string('canonical_url', 255)->nullable();    
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
        Schema::dropIfExists('products');
    }
}
