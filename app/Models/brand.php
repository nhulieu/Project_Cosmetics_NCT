<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = "brand";
    protected $fillable = ['brand_id', 'name','coupon_id' ,'slogan', 'logo' , 'created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}
