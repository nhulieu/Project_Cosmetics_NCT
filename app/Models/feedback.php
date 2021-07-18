<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    protected $table = "feedback";
    protected $fillable = ['id','retired','email','name','subject', 'message', 'created_at', 'updated_at'];
    public $timestamps = true;


}
