<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $fillable = ['id', 'label' , 'created_at', 'updated_at' ,'retired'];
    public $timestamps = true;
}
