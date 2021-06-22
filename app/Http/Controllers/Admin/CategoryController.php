<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function home()
    {
        $category = category::all();
        return view('admin.category.home')->with(["categories" => $category]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function postCreate(Request $request)
    {
        $category = $request->all();
        $c = new category($category);
        $c->save();
        return redirect()->action([CategoryController::class, 'home']);
    }

    public function update($id)
    {
        $category = category::find($id);
        return view('admin.category.update')->with(["category" => $category]);
    }

    public function postUpdate(Request $request, $id)
    {
        $category = $request->all();
        $c = category::where('id', $id);
        $c->update([
            'name' => $category['name'],
            'description' => $category['description']
        ]);
        return redirect()->action([CategoryController::class, 'home']);
    }

    public function delete($id)
    {
        $category = category::where('id', $id);
        $category->update(['retired' => '1']);
        return redirect()->action([CategoryController::class, 'home']);
    }

    public function deleteAll($id)
    {
        category::where('id', $id)->delete();
        return redirect()->action([CategoryController::class, 'home']);
    }

}
