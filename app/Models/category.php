<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $fillable = ['id', 'name', 'description', 'created_at', 'updated_at' ,'retired'];
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(product::class);
    }
}
