<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table = "invoice";
    protected $fillable = ['id', 'receive_date' ,'recipient_fname','recipient_lname','recipient_phone','recipient_address','type','created_at', 'updated_at' ,'retired','order_id'];
    public $timestamps = true;
}
