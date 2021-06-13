<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";
    protected $fillable = ['prod_id',
        'NAME',
        'DESCRIPTION',
        'RETIRED',
        'STATUS',
        'PRICE',
        'SALE',
        'created_at',
        'updated_at',
        'retired'];
    protected $guarded = [];
    public $timestamps = true;
}
