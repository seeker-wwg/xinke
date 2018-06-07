<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServerController extends Controller
{
    public function kebiao(Request $request)
    {
        return view('home/server/kebiao');
    }
}
