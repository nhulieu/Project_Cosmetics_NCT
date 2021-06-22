<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = "product";
    protected $fillable = ['id', 'category_id', 'name', 'description', 'status', 'price', 'discount', 'quantity', 'tax', 'feature', 'mark', 'created_at', 'updated_at', 'retired'];
    protected $guarded = [];
    public $timestamps = true;

    public function getCategory()
    {
        return category::find($this->category_id)->name;
    }

    public function getBrand()
    {
        return brand::find($this->brand_id)->name;
    }

    public function getTag()
    {
        $product_tag = product_tag::where("product_id", "=", $this->id)->pluck("tag_id")->all();
        $tags = tag::whereIn("id", $product_tag)->pluck("label")->all();
        return join(", ", $tags);
    }

    public function getTagId()
    {
        return product_tag::where("product_id", "=", $this->id)->pluck("tag_id");

    }

    public function getDiscount(): string
    {
        return $this->discount > 0 ? '-' . $this->discount . "%" : '';
    }

    public function getImg(): string
    {
        $image = image::where([["product_id", '=', $this->id], ['cover', '=', '1']])->first();
        return $image ? $image->path : "";
    }

    public function Rating()
    {
        $reviews = review::where('product_id',$this->id)->pluck('mark');
        if($reviews->count() > 0)
            return round(collect($reviews)->avg());
        return 0;
    }


    public function nextID()
    {
        $all = product::all();
        if (sizeof($all) == 0) {
            return 1;
        }
        return product::all()->pluck("id")->max() + 1;
    }

    public function getStatus(): string
    {
        switch ($this->status) {
            case '1':
                return 'Available';
                break;

            case '2':
                return 'Unavailable';
                break;

            case '3':
                return 'Incoming';
                break;

            default:
                # code...
                break;
        }
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function images()
    {
        return $this->hasMany(image::class);
    }
}
