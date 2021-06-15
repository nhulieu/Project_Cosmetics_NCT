<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = "review";
    protected $fillable = ['id', 'mark','content' ,'product_id', 'user_id','created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}

