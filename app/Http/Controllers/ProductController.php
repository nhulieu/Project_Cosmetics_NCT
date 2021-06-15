<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Collection;


class ProductController extends Controller
{
    public function paginate($items, $pageLength) : Collection{
        if(count($items)>0){
            $pagesProduct = new Collection();
            foreach(array_chunk($items, $pageLength) as $list_item){
                $a = new Collection();
                foreach($list_item as $item){
                    $a->add(new product($item));
                }
                $pagesProduct->add($a);
            }
            return $pagesProduct;
        }
        return new Collection();
    }

    public function index(){
        $products = product::all()->toArray();
        $gridProducts = $this->paginate($products, 9);
        return view("index",["gridItems"=>$gridProducts, "page"=>0]);
    }
}
