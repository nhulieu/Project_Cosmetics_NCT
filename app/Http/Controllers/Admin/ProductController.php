<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\image;
use App\Models\product;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function home()
    {
        $products = product::where('retired', '0')->get();
        return view('admin.product.home', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function postCreate(Request $request)
    {

    }

    public function delete($id)
    {
        product::where("id", $id)->update(['retired' => '1']);
        return redirect()->action([ProductController::class, 'home']);
    }

    public function review($id)
    {
        $reviews = review::where('product_id', '=', $id)->get();

        return view('admin.product.review', [
            'reviews' => $reviews
        ]);
    }

    public function deleteReview($id)
    {
        review::where("id", $id)->delete();
        return redirect()->back();
    }

    public function image($id)
    {
        $images = image::where('product_id', '=', $id)->get();
        return view('admin.product.images', [
            "id" => $id,
            "images" => $images
        ]);
    }

    public function createImage($id)
    {
        return view('admin.product.createImage', [
            'id' => $id
        ]);
    }

    public function postCreateImage(Request $request, $id)
    {
        try {
            if ($request->hasFile('IMAGE')) {
                $file = $request['IMAGE'];
                $cover = $request['COVER'];

                $product = product::find($id);
                $newImage = new image();
                $newImageID = $newImage->nextID();

                $newName = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move('img/product', $newName);
                $newImage->path = '/img/product/' . $newName;

                if ($cover == '1') {
                    image::where('product_id', '=', $id)->update([
                        'cover' => '0'
                    ]);
                }
                $newImage->cover = $cover;
                $newImage->product_id = $id;
                $newImage->created_at = time();
                $newImage->id = $newImageID;
                $newImage->save();

                $images = image::where('product_id', '=', $id)->get();
                return redirect()->action([ProductController::class, 'image'], ["id" => $id, "images" => $images]);
            }
        } catch (\Throwable $throwable) {
            DB::rollback();
            return redirect()->action([ProductController::class, 'update']);
        }
    }

    public function updateImage($id)
    {
        $image = image::find($id);
        return view('admin.product.updateImage', [
            'image', $image
        ]);
    }

    public function postUpdateImage(Request $request, $id)
    {
        $image = image::find($id);
        $images = image::where('product_id', '=', $image->product_id)->get();
        $cover = $request['COVER'];
        $newPath = "";
        if ($request->hasFile('IMAGE')) {
            $file = $request['IMAGE'];
            //Delete Old Image
            $path_file = "img/" . baseName($image->path);
            if (File::exists($path_file)) {
                File::delete($path_file);
            }

            $newName = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $file->move('img/product', $newName);
            $newPath = '/img/product/' . $newName;

        } else {
            $newPath = $image->path;
        }

        if ($cover == '1') {
            image::where('product_id', '=', $image->product_id)->update(['cover' => '0']);
        }

        $success = $image->where('id', $id)
            ->update(['path' => $newPath, 'cover' => $cover]);
        return redirect()->action([ProductController::class, 'image'], ["id" => $image->product_id, "images" => $images]);
    }

    public function deleteImage($id)
    {
        $path_file = "img/" . baseName(image::find($id)->path);

        if (File::exists($path_file)) {
            File::delete($path_file);
        }
        image::where("id", $id)->delete();

        return redirect()->back();
    }

    public function update($id)
    {
        $product = product::find($id);
        return view('admin.product.update', [
            'product' => $product
        ]);
    }

    public function postUpdate(Request $request, $id)
    {

    }

    public function viewDetail($id)
    {
        $product = product::find($id);
        return view('admin.product.viewDetail',[
            'product' => $product
        ]);
    }


}
