<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableSize extends Model
{
    protected $fillable = ['name','active','created_at','updated_at'];
    use HasFactory;
}
