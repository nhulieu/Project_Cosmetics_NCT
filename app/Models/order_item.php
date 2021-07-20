<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $table = "order_item";
    protected $fillable = ['id', 'product_id', 'order_id', 'quantity', 'created_at', 'updated_at', 'retired'];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function order()
    {
        return $this->belongsTo(order::class);
    }

    public function cart()
    {
        $order = order::find($this->order_id);
        return $order;
    }

    public function products()
    {
        $product = product::find($this->product_id);
        return $product;
    }
}
