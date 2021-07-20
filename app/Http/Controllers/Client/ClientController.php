<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\VerifyCodeMail;
use App\Models\coupon;
use App\Models\feedback;
use App\Models\invoice;
use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use App\Models\review;
use App\Models\user;
use App\Models\wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    public function home()
    {
        $products = product::all();
        $reviews = review::all();
        //$listItem = $this->paginate($products, 9);
        return view("index");
    }

    public function signin(Request $request)
    {
        $username = $request->session()->get("user");
        if($username !== null){
            return redirect('/');
        }
        return view("client.signin", ["isSignup" => false, "status" => "0"]);
    }

    public function signout(Request $request)
    {
        if ($request->session()->get("user")[0]) {
            $request->session()->forget(["user", "userFullname", "wishlistAmount", "order"]);
        }
        return response()->json(["result" => "Sign out success"]);
    }

    public function sigoutExt(Request $request){
        if ($request->session()->get("user")[0]) {
            $request->session()->forget(["user", "userFullname", "wishlistAmount", "order"]);
        }
        return redirect("/");
    }

    public function postSignup(Request $request)
    {
        $fname = $request->input('txtFirstName');
        $lname = $request->input('txtLastName');
        $email = $request->input('txtEmail');
        $username = $request->input('txtUserName');
        $phone = $request->input('txtPhone');
        $address = $request->input('txtAddress');
        $accountPass = $request->input('txtAccountPass');

        $duplicate_email_user = user::where("email", "=", $email)->first();
        $duplicate_username_user = user::where("username", "=", $username)->first();
        if ($duplicate_email_user != null && $duplicate_username_user != null) {
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
        return view("client.signin", ["isSignup" => false, "status" => "2"]);
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
                $request->session()->put("user", $final_user->username);
                $request->session()->put("userFullname", $final_user->fname . " " . $final_user->lname);
                $request->session()->put("wishlistAmount", $final_user->wishlists->count());
                $request->session()->save();
                // dd($request->session()->get("user"));
                if ($final_user->type == 1) {
                    return redirect("admin/product");
                } else {
                    return redirect("/");
                }
            } else {
                return view("client.signin", ["isSignup" => false, "status" => "3"]);
            }
        }

        return view("client.signin", ["isSignup" => false, "status" => "3"]);

    }

    public function updateAccountDetails(Request $request)
    {
        $username = $request->session()->get("user");
        if (user::where("username", "=", $username)->first() != null) {
            user::where("username", "=", $username)->update([
                "fname" => $request->input('txtFirstName'),
                "lname" => $request->input('txtLastName'),
                "email" => $request->input('txtEmail'),
                "phone" => $request->input('txtPhone'),
                "address" => $request->input('txtAddress')
            ]);
            return view("client.account", ["user" => user::where("username", "=", $username)->first(), "status" => "2", "active" => "0"]);
        }
        return view("client.account", ["user" => user::where("username", "=", $username)->first(), "status" => "1"]);
    }

    public function updateAccountPassword(Request $request)
    {
        $currentPassword = $request->input('txtCurrentPassword');
        $newPassword = $request->input('txtNewPassword');
        $username = $request->session()->get("user");
        $user = user::where("username", "=", $username)->first();
        if ($user !== null) {
            if ($user->password === $currentPassword) {
                user::where("username", "=", $username)->update(["password" => $newPassword]);
                return view("client.account", ["user" => user::where("username", "=", $username)->first(), "status" => "4", "active" => "0"]);
            } else {
                return view("client.account", ["user" => user::where("username", "=", $username)->first(), "status" => "5", "active" => "0"]);
            }
        }
        return view("client.account", ["user" => user::where("username", "=", $username)->first(), "status" => "3", "active" => "0"]);
    }

    public function contact()
    {
        return view("client.contact");
    }

    public function postContact(Request $request)
    {
        $message = $request->all();
        $feedback = new feedback();
        $feedback->name = $message['name'];
        $feedback->email = $message['email'];
        $feedback->subject = $message['subject'];
        $feedback->message = $message['message'];
        $feedback->save();
        return redirect('contact')->with('success', 'Your message was sent success');
    }

    public function about()
    {
        return view("client.about");
    }

    public function wishlist(Request $request)
    {
        $user = $request->session()->get("user");
        if ($user !== null) {
            return view("client.account", ["user" => user::where("username", "=", $user)->first(), "status" => "0", "active" => "4"]);
        }
        return redirect("/signin");
    }

    public function addWishlist(Request $request, $id)
    {
        $username = $request->session()->get('user');
        if ($username === null) {
            return response()->json(["result" => ""]);
        }

        $user = user::where("username", "=", $username)->first();

        if ($user === null) {
            return response()->json(["result" => ""]);
        }

        $existed_wish_item = wishlist::where([["user_id", "=", $user->id], ["product_id", "=", $id]])->first();

        if ($existed_wish_item !== null) {
            $request->session()->put("wishlistAmount", $user->wishlists->count());
            return response()->json(["result" => ""]);
        }
        $wish_item = new wishlist();
        $wish_item->user_id = $user->id;
        $wish_item->product_id = $id;
        $wish_item->save();
        $request->session()->put("wishlistAmount", $user->wishlists->count());
        return response()->json(["result" => $user->wishlists->count()]);
    }

    public function deleteWishlist(Request $request, $id)
    {
        $username = $request->session()->get('user');
        if ($username === null) {
            return Redirect("/sigin");
        }

        $user = user::where("username", "=", $username)->first();
        if ($user === null) {
            return response()->json(["result" => 0]);
        }

        wishlist::find($id)->delete();
        $request->session()->put("wishlistAmount", $user->wishlists->count());
        return response()->json(["result" => $user->wishlists->count()]);

    }

    public function account(Request $request)
    {
        $user = $request->session()->get("user");
        if ($user !== null) {

            return view("client.account", ["user" => user::where("username", "=", $user)->first(), "status" => "0", "active" => 0]);
        }
        return redirect("/signin");
    }

    public function order(Request $request)
    {
        $user = $request->session()->get("user");
        $request->session()->put("coupon", 0);
        $request->session()->save();
        if ($user !== null) {
            $order = $request->session()->get("order");

            if ($order !== null) {
                return view("client.order", ["order" => $order]);
            }
            return view("client.order", ["totalQty" => 0, "totalPrice" => 0, "order" => "[]"]);
        }
        return redirect("/signin");
    }

    public function updateOrder(Request $request)
    {
        $order = $request->input("order");
        $request->session()->put("order", json_encode($order));
        $request->session()->save();
        return response()->json(["result" => $order]);
    }

    public function checkout(Request $request){
        $user = $request->session()->get("user");

        if ($user !== null) {
            $order = $request->session()->get("order");
            if($order !== null){
                if(json_decode($order)->totalQty <= 0){
                    return redirect("/");
                }
                $coupon = $request->session()->get("coupon");
                return view("client.checkout",["user"=>user::where("username","=",$user)->first(), "order"=>$order, "coupon" => $coupon]);
            }
            return redirect("/");
        }
        return redirect("/signin");
    }

    public function checkBill(Request  $request, $id){
        if($id === null){
            redirect("/");
        }

        $username = $request->session()->get("user");
        if($username == null){
            return redirect("/");
        }
        $user = user::where("username", "=", $username)->first();
        $order = order::find($id);
        if($order->user_id !== $user->id){
            return redirect("/");
        }

        return view("client.bill",["order"=>$order]);
    }

    public function goBill(Request $request){
        $username = $request->session()->get("user");
        $order = $request->session()->get("order");
        $products = product::all();
        $reviews = review::all();
        if($username === null || $order === null){
            return redirect("/");
        }
        if(json_decode($order)->totalQty <= 0){
            return redirect("/");
        }
        $user = user::where("username", "=", $username)->first();

        $sessionOrder = json_decode($request->session()->get("order"));
        $coupon = $request->session()->get("coupon");

        //Create invoice
        $invoice = new invoice();
        $invoice->recipient_fname = $user->fname;
        $invoice->recipient_lname = $user->lname;
        $invoice->recipient_phone = $user->phone;
        $invoice->recipient_address = $user->address;
        $invoice->type = $request->input("paymentMethod");
        $invoice->save();

        //Create Order
        $order = new order();
        $order->order_date = Carbon::now();
        $order->user_id = $user->id;
        $order->status = 1;
        $order->coupon_value = $coupon !== null ? $coupon : 0;
        $order->invoice_id = $invoice->id;
        $order->save();

        //Create Order Item
        foreach ($sessionOrder->items as $item){
            $order_item = new order_item();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item->id;
            $order_item->quantity = $item->count;
            $order_item->save();
        }

        $request->session()->remove("order");
        $request->session()->save();
//        return view("client.bill",["order"=>$order]);
        return response()->json(["orderId" => $order->id]);
    }

    public function applyCoupon(Request $request){
        $brand_ids = $request->ids;
        $coupon_code = $request->code;
        $coupon = coupon::whereIn('brand_id', $brand_ids)
            ->where("active","=", true)
            ->where("retired", "=", "false")
            ->where("code","=",$coupon_code)
            ->first();
        if($coupon !== null){
            if(!$coupon->active){
                return response()->json(["result"=>[["state" => 1]]]);
            }
            $request->session()->put("coupon", $coupon->discount);
            $request->session()->save();
            return response()->json(["result"=>["state" => 0, "coupon" => $coupon]]);
        }
        return response()->json(["result"=>[["state" => 2]]]);
    }

    public function orderDetails(Request $request, $id)
    {
        $user = $request->session()->get("user");
        if ($user !== null) {
            return view("client.order_details", ["order" => order::find($id)]);
        }
        return view("index");
    }

    public function productDetails($id)
    {
        $products = product::all();
        $product = product::find($id);
        if ($product->retired) {
            return view("index");
        }
        return view("client.product_details", ["product" => $product]);
    }

    public function product(Request $request)
    {
        $product_query = product::query();
        $name = null;
        $brand = null;
        $category = null;
        $from = null;
        $to = null;
        $status = null;
        $mark = null;
        $tag = null;
        $newArrival = false;
        if (count($request->query()) > 0) {
            $name = $request->input("name");
            $brand = $request->input("brand");
            $category = $request->input("category");
            $from = $request->input("from");
            $to = $request->input("to");
            $status = $request->input("status");
            $tag = $request->input("tag");
            $mark = $request->input("mark");
            $newArrival = $request->input("newArrival");
            if ($name != null) {
                $product_query->where('name', 'LIKE', '%' . $name . '%');
            }
            if ($brand != null) {
                $product_query->where('brand_id', '=', $brand);
            }
            if ($category != null) {
                $product_query->where('category_id', '=', $category);
            }
            if ($from != null) {
                $product_query->whereRaw("price * (100 - discount)/100 >= ?" , [$from]);
            }
            if ($to != null) {
                $product_query->whereRaw("price * (100 - discount)/100 <= ?" , [$to]);
            }
            if ($status != null) {
                $product_query->where('status', '=', $status);
            }
            if ($tag != null) {
                $product_query->leftJoin('product_tag', 'product_tag.product_id', '=', 'product.id')->where("tag_id", "=", $tag);
            }
            if($mark != null){
                $product_query->where('mark', '>=', $mark);
            }
        }

        $products = $product_query->paginate(9)->withQueryString();
        return view("client.product", ["products" => $products, "name" => $name, "brandInput" => $brand, "categoryInput" => $category, "from" => $from, "to" => $to, "status" => $status]);
    }

    public function submitReview(Request $request, $id){
        $username = $request->session()->get("user");
        if($username === null){
            return response()->json("");
        }
        $user = user::where("username", "=", $username)->first();
        $review = new review();
        $review->user_id = $user->id;
        $review->product_id = $id;
        $review->mark = $request->input('mark');
        $review->content = $request->input('content');
        $review->save();
        $product = product::find($id);
        $sum = 0;
        foreach ($product->reviews as $review){
            $sum += $review->mark;
        }
        $newMark = floor($sum / $product->reviews->count());
        $product->update(['mark' => $newMark]);
        $view = view('client.review_update')->with(['product'=> $product]);
        return $view;
    }

    public function checkEmail(Request $request){
        $email = $request->input("email");
        $user = user::where("email", "=", $email)->first();
        if($user === null){
            return response()->json(["result"=>"Account with this email doesn't exist !"]);
        }
        $verification_code = random_int(100000, 999999);
        user::where("email", "=", $email)->update(['verifyCode'=>$verification_code]);

        $email_param = new \stdClass();
        $email_param->receiver = $user->lname." ".$user->fname;
        $email_param->code = $verification_code;

        $newEmail = new VerifyCodeMail($email_param);
        $newEmail->emailParam = $email_param;

        Mail::to($email)->send($newEmail);

        if (Mail::failures()) {
            return response()->json(["result"=>"Fail to send verification code to Mail !", "code"=>$verification_code]);
        }

        return response()->json(["result"=>"A verification code has been sent to your mail !", "code"=>$verification_code]);
    }

    public function checkCode(Request $request){
        $code = $request->input("code");
        $email = $request->input("email");
        $user = user::where("email", "=", $email)->first();
        if($user !== null){
            if($user->verifyCode === trim($code)){
                return response()->json(["isSuccess"=>true, "message"=>"Correct Verification Code !"]);
            }
            return response()->json(["isSuccess"=>false, "message"=>"Verification Code not correct!"]);
        }
        return response()->json(["isSuccess"=>false, "message"=>"Error verifying the code !"]);
    }

    public function resetPassword(Request $request){
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        $email = $request->input("email");
        $user = user::where("email", "=", $email)->first();
        if($user !== null){
            if ($password === $confirmPassword) {
                user::where("email", "=", $email)->update(["password" => $password]);
                return response()->json(["isSuccess"=>true, "message"=>"Successfully changed password !"]);
            }
            return response()->json(["isSuccess"=>false, "message"=>"Confirm password and password must be the same !"]);
        }

        return response()->json(["isSuccess"=>false, "message"=>"Error changing the password !"]);
    }
}
