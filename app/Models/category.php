<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $fillable = ['cat_id', 'label' , 'created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}
