<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function profile() {
        $profile = user::where('type', '=', 1)->first();
        return view('admin.profile.profile', [
            'profile' => $profile
        ]);
    }

    public function updatePasswordProfile(Request $request) {

        $this->validate($request, [
            'password' => 'required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required'
        ]);

        $info = $request->all();
        $profile = user::where('type', 1);
        $profile->update([
            'password' => $info['password'],
        ]);
        return back()->with('success','Update successfully !');    }
}

