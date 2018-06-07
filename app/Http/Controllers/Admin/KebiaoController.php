<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Kebiao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KebiaoController extends Controller
{
    public function index(Request $request)
    {
        $info = Kebiao::with('banji')->with('teacher')->with('course')->get();
        return view('admin/kebiao/index',compact('info'));
    }
}
