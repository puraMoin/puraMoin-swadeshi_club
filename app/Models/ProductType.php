<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['category_id','sub_category_id','name','page_title','page_slug','canonical_url','active','display_home_page',
                      'image_file','meta_title','meta_description' ,'created_at','updated_at'];    
    use HasFactory;

    // Define the belongsTo relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'product_type_id', 'id');
    }
}
