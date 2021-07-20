<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = "coupon";
    protected $fillable = ['id', 'name', 'code', 'description', 'active', 'start_date', 'end_date', 'discount', 'created_at', 'updated_at', 'retired', 'brand_id'];
    public $timestamps = true;

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
}
