<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->nullable();
            $table->string('alias', 45)->nullable();
            $table->string('title', 45)->nullable();
            $table->string('smal_image', 45)->nullable();
            $table->string('big_image', 45)->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('display_home_page')->default(0);
            $table->string('page_slug', 45)->nullable();
            $table->string('page_url', 255)->nullable();
            $table->string('canonical_url', 255)->nullable();
            $table->string('page_title', 45)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
