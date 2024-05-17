<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableColor extends Model
{
    protected $fillable = ['name','color_code','active','created_at','updated_at'];
    use HasFactory;
}
