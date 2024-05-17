<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'product_id', 'created_at','updated_at'];

    use HasFactory;

    // Define the belongsTo relationship
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    // Define the belongsTo relationship
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
