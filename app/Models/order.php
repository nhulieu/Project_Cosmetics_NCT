<?php

namespace App\Models;

use App\order_item;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    protected $fillable = ['id', 'status', 'invoice_id','order_date', 'created_at', 'updated_at', 'retired', 'user_id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(\App\Models\order_item::class);
    }

    public function invoice(){
        return $this->belongsTo(invoice::class);
    }

    public function total(){
        $items = $this->items()->get();
//        dd($items);
        $coupon = $this->coupon_value != null ? $this->coupon_value : 0;
        $sum = 0;
        foreach ($items as $item){
            $sum = $sum + $item->product->price * $item->quantity;
        }
        return $sum - $coupon;
    }

    public static function getItemOrder($id)
    {
        $getItemOrder = order_item::where("order_id", "=", $id)->get();
        return $getItemOrder;
    }

    public function getNameOfUser()
    {
        $getUser = user::where("id", "=", $this->user_id)->first();
        return $getUser->fname . " " . $getUser->lname;
    }

    public function getEmailOfUser()
    {
        $getUser = user::where("id", "=", $this->user_id)->first();
        return $getUser->email;
    }
}
