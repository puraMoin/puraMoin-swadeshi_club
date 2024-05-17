<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_code','category_id','sub_category_id','product_type_id','brand_id','name',
    'price','in_stock','display_home_page','spefication','active','is_offer_applicable','apply_tax','tax_value',
    'page_title','page_slug','canonical_url','image_file','meta_title','meta_description' ,'created_at','updated_at'];  

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
    public function producttype()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    //define the HasMany relationship 
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

}
