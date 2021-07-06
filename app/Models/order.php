<?php

namespace App\Models;

use App\order_item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    protected $fillable = ['id', 'status', 'order_date', 'created_at', 'updated_at', 'retired', 'user_id'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(order_item::class);
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
