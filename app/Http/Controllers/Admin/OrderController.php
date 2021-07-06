<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;

class OrderController extends Controller
{
    public function home()
    {
        $order = order::all();
        return view('admin.order.home')->with([
            "order" => $order
        ]);
    }

    public function viewDetail($id)
    {
        $item = order::getItemCart($id);
        return view('admin.order.detail')->with([
            "item" => $item
        ]);
    }
}
