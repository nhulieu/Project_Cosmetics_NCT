<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use App\Models\user;
use App\Models\wishlist;
use App\order_item;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
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

    public function signout(Request $request){
        if($request->session()->get("user")[0]){
            $request->session()->forget(["user", "userFullname","wishlistAmount"]);
        }
        return Redirect("/");
    }

    public function postSignup(Request $request){
        $fname = $request->input('txtFirstName');
        $lname = $request->input('txtLastName');
        $email = $request->input('txtEmail');
        $username = $request->input('txtUserName');
        $phone = $request->input('txtPhone');
        $address = $request->input('txtAddress');
        $accountPass = $request->input('txtAccountPass');

        $duplicate_email_user = user::where("email", "=", $email)->first();
        $duplicate_username_user = user::where("username", "=", $username)->first();
        if($duplicate_email_user != null && $duplicate_username_user != null){
            return view("client.signin", ["isSignup"=>true,"status"=>"1"]);
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
        if($final_user != null){
            if($password === $final_user->password){
                $request->session()->put("user", $final_user->username);
                $request->session()->put("userFullname", $final_user->fname." ".$final_user->lname);
                $request->session()->put("wishlistAmount", $final_user->wishlists->count());
                $request->session()->save();
                // dd($request->session()->get("user"));
                return redirect("/");
            } else {
                return view("client.signin", ["isSignup" => false, "status" => "3"]);
            }
        }

        return view("client.signin", ["isSignup" => false, "status" => "3"]);

    }

    public function updateAccountDetails(Request $request){
        $fname = $request->input('txtFirstName');
        $lname = $request->input('txtLastName');
        $email = $request->input('txtEmail');
        $phone = $request->input('txtPhone');
        $address = $request->input('txtAddress');
        $username = $request->session()->get("user");
        if(user::where("username", "=", $username)->first() != null){
            user::where("username", "=", $username)->update([
                "fname" => $request->input('txtFirstName'),
                "lname" => $request->input('txtLastName'),
                "email" => $request->input('txtEmail'),
                "phone" => $request->input('txtPhone'),
                "address" => $request->input('txtAddress')
            ]);
            return view("client.account",["user"=>user::where("username", "=", $username)->first(), "status"=>"2"]);
        }
        return view("client.account",["user"=>user::where("username", "=", $username)->first(), "status"=>"1"]);
    }

    public function updateAccountPassword(Request $request){
        $currentPassword = $request->input('txtCurrentPassword');
        $newPassword = $request->input('txtNewPassword');
        $username = $request->session()->get("user");
        $user = user::where("username","=",$username)->first();
        if($user !== null){
            if($user->password === $currentPassword){
                user::where("username","=",$username)->update(["password"=>$newPassword]);
                return view("client.account",["user"=>user::where("username", "=", $username)->first(), "status"=>"4"]);
            }else{
                return view("client.account",["user"=>user::where("username", "=", $username)->first(), "status"=>"5"]);
            }
        }
        return view("client.account",["user"=>user::where("username", "=", $username)->first(), "status"=>"3"]);
    }

    public function contact()
    {
        return view("client.contact");
    }

    public function about()
    {
        return view("client.about");
    }

    public function wishlist(Request $request)
    {
        $user = $request->session()->get("user");
        if($user !== null){

            return view("client.account",["user"=>user::where("username","=",$user)->first(), "status"=>"0", "active"=>"4"]);
        }
        return view("signin");
    }

    public function addWishlist(Request $request, $id){
        $username = $request->session()->get('user');
        if($username === null){
            return Redirect("/sigin");
        }

        $user = user::where("username", "=", $username)->first();

        if($user === null){
            return response()->json(["result"=>0]);
        }
        //dd($user->wishlists->count);
        // $request->session()->put("wishlistAmount", $user->wishlists->count());
        // return response()->json(["result"=>2]);

        $existed_wish_item = wishlist::where([["user_id", "=", $user->id], ["product_id", "=", $id]])->first();

        if($existed_wish_item !== null){
            $request->session()->put("wishlistAmount", $user->wishlists->count());
            return response()->json(["result"=>$user->wishlists->count()]);
        }
        $wish_item = new wishlist();
        $wish_item->user_id = $user->id;
        $wish_item->product_id = $id;
        $wish_item->save();
        $request->session()->put("wishlistAmount", $user->wishlists->count());
        return response()->json(["result"=>$user->wishlists->count()]);
    }

    public function deleteWishlist(Request $request, $id){
        $username = $request->session()->get('user');
        if($username === null){
            return Redirect("/sigin");
        }

        $user = user::where("username", "=", $username)->first();
        if($user === null){
            return response()->json(["result"=>0]);
        }

        wishlist::find($id)->delete();
        $request->session()->put("wishlistAmount", $user->wishlists->count());
        return response()->json(["result"=>$user->wishlists->count()]);

    }

    public function account(Request $request)
    {
        $user = $request->session()->get("user");
        if($user !== null){

            return view("client.account",["user"=>user::where("username","=",$user)->first(), "status"=>"0", "active"=>"0"]);
        }
        return view("index");
    }

    public function order(Request $request)
    {
        $user = $request->session()->get("user");
        if ($user !== null) {
            return view("client.order");
        }
        return view("index");
    }

    public function orderDetails(Request $request, $id)
    {
        $user = $request->session()->get("user");
        if ($user !== null) {
            return view("client.order_details",["order" => order::find($id)]);
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
