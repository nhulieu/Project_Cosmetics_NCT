<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = "image";
    protected $fillable = ['id', 'product_id', 'alt', 'path', 'created_at', 'updated_at', 'cover'];
    public $timestamps = true;

    public function nextID()
    {
        $all = image::all();
        if (sizeof($all) == 0) {
            return 1;
        }
        return image::all()->pluck("id")->max() + 1;
    }

    public function ImageName()
    {
        return basename($this->path);
    }

    public function product()
    {
        return $this->belongsTo(product::class);
    }

}
