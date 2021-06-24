<?php

namespace App\Http\Controllers\Client;

use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function contact()
    {
        return view("client.contact");
    }

}
