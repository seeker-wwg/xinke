<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Livecourse;

class PersonController extends Controller
{
    /**
     * 展示课程相关信息
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function course(Request $request)
    {
        //获得"直播课程"列表信息
        $livecourse = Livecourse::get();
        return view('home/person/course', compact('livecourse'));
    }
}
