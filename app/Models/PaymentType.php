<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $fillable = ['name','active','created_at','updated_at'];
    use HasFactory;
}
