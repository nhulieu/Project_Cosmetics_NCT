<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = "user";
    protected $fillable = ['id','fname','lname','email','username','password','address','token','active','amount_spend','type','updated_at','created_at','retired'];
    public $timestamps = true;
}
