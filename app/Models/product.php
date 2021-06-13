<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";
    protected $fillable = ['prod_id', 'cat_id', 'brand_id', 'image_id', 'rev_id', 'name', 'title','sub_title','description','price','discount','quantity','tax','feature','mark', 'created_at', 'updated_at', 'retired'];
    protected $guarded = [];
    public $timestamps = true;
}
