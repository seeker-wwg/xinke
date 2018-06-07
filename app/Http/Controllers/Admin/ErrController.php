<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrController extends Controller
{
    //错误试图展示
    public function index(Request $request)
    {
        return view('admin/err/index');
    }
}
