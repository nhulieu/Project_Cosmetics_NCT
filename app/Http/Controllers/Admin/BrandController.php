<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function home()
    {
        $brand = brand::all();
        return view('admin.brand.home')->with(["brand" => $brand]);
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function postCreate(Request $request)
    {
        $brand = $request->all();
        $b = new brand($brand);
        $b->save();
        return redirect()->action([BrandController::class, 'home']);
    }

    public function update($id)
    {
        $brand = brand::find($id);
        return view('admin.brand.update')->with(["brand" => $brand]);
    }

    public function postUpdate(Request $request, $id)
    {
        $brand = $request->all();
        $b = brand::where('id', $id);
        $b->update([
            'name' => $brand['name'],
            'slogan' => $brand['slogan'],
            'logo' => $brand['logo']
        ]);
        return redirect()->action([BrandController::class, 'home']);
    }

    public function delete($id)
    {
        $brand = brand::where('id', $id);
        $brand->update(['retired' => '1']);
        return redirect()->action([BrandController::class, 'home']);
    }
}
