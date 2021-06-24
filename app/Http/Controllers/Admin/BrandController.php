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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->file('image')->getClientOriginalName();

        $request->file('image')->move(public_path('img/brand_logo/'), $imageName);

        $brand = brand::create([
            'name' => $request->input('name'),
            'slogan' => $request->input('slogan'),
            'logo' => $imageName
        ]);

        return redirect()->action([BrandController::class, 'home']);
    }

    public function update($id)
    {
        $brand = brand::find($id);
        return view('admin.brand.update')->with(["brand" => $brand]);
    }

    public function postUpdate(Request $request, $id)
    {

        $imageName = $request->file('image')->getClientOriginalName();

        $request->file('image')->move(public_path('img/brand_logo/'), $imageName);

        brand::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'slogan' => $request->input('slogan'),
                'logo' => $imageName
            ]);
        return redirect()->action([BrandController::class, 'home']);
    }

    public function delete($id)
    {
        $brand = brand::where('id', $id);
        $brand->update(['retired' => '1']);
        return redirect()->action([BrandController::class, 'home']);
    }

    public function sureDelete($id)
    {
        brand::where('id', $id)->delete();
        return redirect()->action([BrandController::class, 'home']);
    }
}
