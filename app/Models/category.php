<?php

namespace App\Models;

use App\Models;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    public $incrementing = false;
    public function game(){
        $product = product::find($this->prod_id);
        return $product;
    }
    public function category(){
        $category = category::find($this->cat_id);
        return $category;
    }
}
