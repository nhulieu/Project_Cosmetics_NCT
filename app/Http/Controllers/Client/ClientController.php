<?php

namespace App\Http\Controllers\Client;

use App\Models\brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Support\Collection;

class ClientController extends Controller
{
    public function contact(){
        return view("client.contact");
    }

    public function product(){
        $products = product::all();
        $brands = brand::all();
        return view("client.product",["products"=>$products, "brands"=>$brands]);
    }
}
