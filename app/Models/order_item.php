<?php

namespace App;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $table = "order_item";
    protected $fillable = ['id', 'product_id', 'order_id', 'quantity', 'created_at', 'updated_at', 'retired'];
    public $timestamps = true;
}
