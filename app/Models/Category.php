<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $fillable = ['name','alias','title','smal_image','big_image','description','active','display_home_page',
                      'page_slug','page_url','page_title','meta_title','meta_description' ,'created_at','updated_at'];
    use HasFactory;

        // Define the hasMany relationship
        public function subcategory()
        {
            return $this->hasMany(SubCategory::class, 'category_id', 'id');
        }
        public function producttype()
        {
            return $this->hasMany(ProductType::class, 'category_id', 'id');
        }
        public function product()
        {
            return $this->hasMany(Product::class, 'category_id', 'id');
        }
}
