<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Livecourse;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\models\Stream;

class LivecourseController extends Controller
{
        //直播课程列表
    public function index()
    {

        $info = Livecourse::with('stream')->get();
        // $info = $info->toArray();
        // dd(compact('info'));
        // dd($info->toArray());
        return view('admin\livecourse\index', compact('info'));
        // return view('admin\livecourse\index', ['info' => $info]);

    }

           //添加直播课程列表
    public function tianjia(Request $request)
    {
        if ($request->isMethod('post')) {
            //数据校验
            $rules = [
                'name' => 'required',
                'stream_id' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
            ];
            $notices = [
                'name.required' => '直播课程名称必填',
                'stream_id.required' => '直播流必选',
                'start_at.required' => '课程开始时间必填',
                'end_at.required' => '课程结束时间必填',
            ];
            $form_data = $request->all();
            $validator = Validator::make($form_data, $rules, $notices);
            if ($validator->passes()) {
                //存储直播课程信息到数据库

                //把收集到的格式化时间变为“时间戳”格式
                $form_data['start_at'] = strtotime($form_data['start_at']);
                $form_data['end_at'] = strtotime($form_data['end_at']);

                Livecourse::create($form_data);
                return ['success' => true];
            } else {
                $errorinfo = collect($validator->messages())->implode('0', '|');
                return ['success' => false, 'errorinfo' => $errorinfo];
            }
        }
        // $info = Livecourse::with('stream')->get();
        $stream = DB::table('stream')->pluck('stream_name', 'stream_id')->toArray();
        return view('admin\livecourse\tianjia', compact('stream'));

    }

    /**
     * 获取直播课程的"推流地址"
     * @param Request $request
     * @param Livecourse $livecourse
     * @param Stream $stream
     * @return string
     */
    public function getpush(Request $request, Livecourse $livecourse, Stream $stream)
    {
        //rtmp://<RTMPPublishDomain>/<Hub>/<StreamKey>?e=<ExpireAt>&token=<Token>
        //rtmp://pili-publish.www.51lfgl.cn/itcast009/education02?e=1500516066&token=2t9rE0m_fRDtvrahjNA-uAAYL17TShcNSJTD07iH:YcAT7JzeGqmXe3WdH-ztMQ6ZJGM=
        $host = "pili-publish.www.51lfgl.cn";
        $space = "itcast009";
        $liuname = $stream->stream_name;
        $e = $livecourse->end_at;

        //制作鉴权
        //$path = "/<Hub>/<StreamKey>?e=<ExpireAt>"
        $path = "/$space/$liuname?e=$e";  //鉴权格式
        //获取access_key和secret_key
        //通过功能包类实现鉴权制作
        $ak = config('filesystems.disks.qiniu.access_key');
        $sk = config('filesystems.disks.qiniu.secret_key');
        //vendor/qiniu/php-sdk/src/Qiniu/Auth.php
        $auth = new \Qiniu\Auth($ak, $sk);
        //2t9rE0m_fRDtvrahjNA-uAAYL17TShcNSJTD07iH:ldeGNvrpiU70IouKfW4del0ISWs=
        $token = $auth->sign($path);

        //拼装推流地址
        return "rtmp://$host/$space/$liuname?e=$e&token=$token";
    }
}
