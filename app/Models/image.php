<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = "image";
    protected $fillable = ['id', 'product_id','alt','path','created_at','updated_at'];
    public $timestamps = true;
}
