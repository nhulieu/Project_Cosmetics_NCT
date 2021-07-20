<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Support\Collection;


class ProductController extends Controller
{
    public function paginate($items, $pageLength): Collection
    {
        if (count($items) > 0) {
            $pagesProduct = new Collection();
            foreach (array_chunk($items, $pageLength) as $list_item) {
                $a = new Collection();
                foreach ($list_item as $item) {
                    $a->add(new product($item));
                }
                $pagesProduct->add($a);
            }
            return $pagesProduct;
        }
        return new Collection();
    }

    public function index()
    {
        $products = product::all();
        //$listItem = $this->paginate($products, 9);
        return view("index", ["listItem" => $products]);
    }

}
