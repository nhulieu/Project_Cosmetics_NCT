<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = "review";
    protected $fillable = ['rev_id', 'mark','status' ,'body', 'title' , 'created_at', 'update_at' ,'retired'];
}

