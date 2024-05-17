<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','image_file' ,'active','created_at','updated_at'];
    use HasFactory;

    public function product()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
