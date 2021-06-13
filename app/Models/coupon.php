<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = "coupon";
    protected $fillable = ['coupon_id', 'code' ,'description','active','value','start_date','end_date','discount_value','created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}
