<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function postRegister(Request $request)
    {
        $fname = $request->input('txtFirstName');
        $lname = $request->input('txtLastName');
        $email = $request->input('txtEmail');
        $username = $request->input('txtUserName');
        $phone = $request->input('txtPhone');
        $address = $request->input('txtAdress');
        $accountPass = $request->input('txtAccountPass');
        // login table
        $user = new user();
        $user->type = 2;
        $user->fnam = $fname;
        $user->lname = $lname;
        $user->email = $email;
        $user->username = $username;
        $user->password = $accountPass;
        $user->address = $address;
        $user->phone = $phone;
        $user->save();
        return redirect()->action([UserController::class, 'signin']);
    }

    public function signin()
    {
        return view('user.signin');
    }

    public function checkSignin(Request $request)
    {
        $accountEmail = $request->input('txtEmail');
        $accountPass = $request->input('txtAccountPass');

        $user = DB::table('user')->where('email', $accountEmail)->first();
        if ($user == null) {
            //
        } else {
            if ($user->password != $accountPass) {
                //
            } else {
                $request->session()->put('customer', $user);
                return $this->userList();
            }
        }
    }

    public function userList()
    {
        $users = DB::table('user')->get();
        return view('user.userList')->with(['users' => $users]);
    }
}
