<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //测试
    public function test()
    {
        dd(bcrypt(22051440202));

    }
}
