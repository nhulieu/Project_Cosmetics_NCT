<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    protected $fillable = ['id', 'status', 'order_date' ,'created_at', 'updated_at' ,'retired', 'user_id'];
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function items()
    {
        return $this->hasMany(order_item::class);
    }
}
