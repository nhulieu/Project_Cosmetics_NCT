<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = "user";
    protected $fillable = ['user_id','user_type','fname','lname','email','username','password','address','token','active','amount_spend','updated_at','created_at','retired'];
    public $timestamps = true;
}
