<?php

namespace App;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $table = "order_item";
    protected $fillable = ['or_id', 'prod_id', 'order_date', 'quantity', 'created_at', 'update_at', 'retired'];
    public $timestamps = true;
}
