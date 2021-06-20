<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    protected $table = "wishlist";
    protected $fillable = ['id', 'retired', 'created_at', 'updated_at', 'user_id', 'product_id'];
    public $timestamps = true;
}
