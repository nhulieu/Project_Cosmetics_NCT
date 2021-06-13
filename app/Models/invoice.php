<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $table = "invoice";
    protected $fillable = ['invoice_id', 'receive_date' ,'recipient_fname','recipient_lname','recipient_phone','recipient_address','invoice_date','type','created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}
