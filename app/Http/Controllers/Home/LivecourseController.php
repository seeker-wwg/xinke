<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Stream;

class LivecourseController extends Controller
{
    /**
     * 播放直播课程
     * @param Request $request
     * @param Stream $stream
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function play(Stream $stream)
    {
        //制作拉流地址
        //rtmp://pili-live-rtmp.www.51lfgl.cn/itcast009/education02
        $pullurl = "rtmp://pili-live-rtmp.www.51lfgl.cn/itcast009/" . $stream->stream_name;

        return view('home/livecourse/play', compact('pullurl'));
    }
}
