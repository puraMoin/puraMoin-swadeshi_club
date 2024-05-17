<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

    protected $fillable = ['category_id','name','active','display_home','image_file',
    'page_slug','page_url','page_title','created_at','updated_at'];

    use HasFactory;
        // Define the belongsTo relationship
        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id', 'id');
        }
        public function producttype()
        {
            return $this->hasMany(ProductType::class, 'sub_category_id', 'id');
        }
        public function product()
        {
            return $this->hasMany(Product::class, 'sub_category_id', 'id');
        }
}
