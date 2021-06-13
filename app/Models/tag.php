<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = "tag";
    protected $fillable = ['tag_ id','label','description','created_at', 'update_at' ,'retired'];
    public $timestamps = true;
}
