<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $table = "product_image";
    protected $fillable = ['image_id','alt','path','created_at','update_at'];
}
