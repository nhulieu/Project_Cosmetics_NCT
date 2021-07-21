<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $order = order::orderByDesc('created_at')->get();
        return view('admin.chart.chart');
    }

    public function logout(Request $request)
    {
        if ($request->session()->get("user")[0]) {
            $request->session()->forget("user");
        }
        return redirect('/');
    }
}
