<?php

namespace App\Http\Controllers\Client;

use App\Models\brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\user;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function home()
    {
        $products = product::all();
        //$listItem = $this->paginate($products, 9);
        return view("index", ["listItem" => $products]);
    }

    public function signin()
    {
        return view("client.signin", ["isSignup" => true, "status" => "0"]);
    }

    public function postSignup(Request $request)
    {
        $fname = $request->input('txtFirstName');
        $lname = $request->input('txtLastName');
        $email = $request->input('txtEmail');
        $username = $request->input('txtUserName');
        $phone = $request->input('txtPhone');
        $address = $request->input('txtAdress');
        $accountPass = $request->input('txtAccountPass');

        $duplicate_email_user = user::where("email", "=", $email);
        if ($duplicate_email_user != null) {
            return view("client.signin", ["isSignup" => true, "status" => "1"]);
        }

        // login table
        $user = new user();
        $user->type = 2;
        $user->fname = $fname;
        $user->lname = $lname;
        $user->email = $email;
        $user->username = $username;
        $user->password = $accountPass;
        $user->address = $address;
        $user->phone = $phone;
        $user->save();
        return view("client.signin", ["isSignup" => true, "status" => "2"]);
    }

    public function postSignin(Request $request)
    {
        $user = $request->input("txtLoginUser");
        $password = $request->input("txtLoginPassword");
        $queryUser = user::where("username", "=", $user);
        if (Str::contains($user, '@')) {
            $queryUser = user::where("email", "=", $user);
        }

        $final_user = $queryUser->first();

        if ($final_user != null) {
            if ($password === $final_user->password) {
                return redirect("/");
            } else {
                return view("client.signin", ["isSignup" => false, "status" => "3"]);
            }
        }

        return view("client.signin", ["isSignup" => false, "status" => "3"]);

    }

    public function contact()
    {
        return view("client.contact");
    }

    public function about()
    {
        return view("client.about");
    }

    public function wishlist()
    {
        return view("client.wishlist");
    }

    public function account(Request $request)
    {
        $user = $request->session()->get("user");
        if ($user === null) {
            return view("client.account");
        }
        return view("index");
    }

    public function order(Request $request)
    {
        $user = $request->session()->get("user");
        if ($user === null) {
            return view("client.order");
        }
        return view("index");
    }

    public function orderDetails(Request $request)
    {
        $user = $request->session()->get("user");
        if ($user === null) {
            return view("client.order_details");
        }
        return view("index");
    }

    public function productDetails($id)
    {
        $product = product::find($id);
        $brands = brand::all();
        if ($product->retired) {
            return view("index");
        }
        return view("client.product_details", ["product" => $product, "brands" => $brands]);
    }

    public function product()
    {
        $products = product::all();
        $brands = brand::all();
        return view("client.product", ["products" => $products, "brands" => $brands]);
    }

}
