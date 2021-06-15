<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_tag extends Model
{
    protected $table = "product_tag";
    protected $fillable = ['id', 'product_id', 'tag_id', 'created_at', 'updated_at' ,'retired'];
}


