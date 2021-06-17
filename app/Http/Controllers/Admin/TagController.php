<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function home()
    {
        $tags = tag::all();
        return view('admin.tag.home')->with(["tags" => $tags]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function postCreate(Request $request)
    {
        $tag = $request->all();
        $t = new tag($tag);
        $t->save();
        return redirect()->action([TagController::class, 'home']);
    }

    public function update($id)
    {
        $tag = tag::find($id);
        return view('admin.tag.update')->with(["tag" => $tag]);
    }

    public function postUpdate(Request $request, $id)
    {
        $brand = $request->all();
        $b = tag::where('id', $id);
        $b->update([
            'label' => $brand['label'],
            'description' => $brand['description']
        ]);
        return redirect()->action([TagController::class, 'home']);
    }

    public function delete($id)
    {
        $brand = tag::where('id', $id);
        $brand->update(['retired' => '1']);
        return redirect()->action([TagController::class, 'home']);
    }
}
