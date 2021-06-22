<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = "brand";
    protected $fillable = ['id', 'name', 'slogan', 'logo' , 'created_at', 'updated_at' ,'retired'];
    public $timestamps = true;
}
