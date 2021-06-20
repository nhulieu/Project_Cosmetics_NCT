<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class product extends Model
{
    protected $table = "product";
    protected $fillable = ['id', 'category_id', 'name','description', 'status','price','discount','quantity','tax','feature','mark', 'created_at', 'updated_at', 'retired'];
    protected $guarded = [];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
