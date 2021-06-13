<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "order";
    protected $fillable = ['or_id', 'status' ,'created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}
