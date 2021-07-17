<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = "brand";
    protected $fillable = ['id', 'name', 'slogan', 'logo' , 'created_at', 'updated_at' ,'retired'];
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(product::class);
    }

    public function coupons(){
        return $this->hasMany(coupon::class);
    }
}
