<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Stream;
use Illuminate\Support\Facades\Validator;

class StreamController extends Controller
{
        //直播流列表
    public function index()
    {

        $info = Stream::get();
        return view('admin\stream\index', compact('info'));

    }
        //添加直播流
    public function tianjia(Request $request)
    {
        if ($request->isMethod('post')) {
            $datas = $request->all();
            // dd($datas);
            // return $datas;
           
            //验证规则
            $rules = [
                'stream_name' => 'required'
            ];

            //验证提醒
            $notices = [
                'stream_name.required' => '直播流名称不能为空'
            ];

            $validator = Validator::make($datas, $rules, $notices);



            if ($validator->passes()) {

                Stream::create($datas);
                return ['success' => true];

            } else {
                $errorinfo = collect($validator->messages())->implode('0', '|');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }

        return view('admin\stream\tianjia');

    }
}








// if ($request->isMethod('post')) {
//     //制作校验
//     $rules = [
//         'stream_name' => 'required|unique:stream,stream_name',
//     ];
//     $notices = [
//         'stream_name.required' => '直播流必填',
//         'stream_name.unique' => '直播流名字已经存在',
//     ];
//     $shuju = $request->all();
//     $validator = Validator::make($shuju, $rules, $notices);

//     //判断校验
//     if ($validator->passes()) {
//         //校验成功

//       /*   //【把添加的直播流同步到七牛云平台】
//         $space = "itcast009";               //直播空间名称
//         $method = 'POST';
//         $path = "/v2/hubs/$space/streams";
//         $host = 'pili.qiniuapi.com';
//         $contentType = 'application/json';
//         $body = json_encode([
//             'key' => $shuju['stream_name'],  //直播流名称，json字符串体现
//         ]);
//         //鉴权数据格式
//         $signdata = "$method $path\nHost: $host\nContent-Type: $contentType\n\n$body";

//         //通过功能包类实现鉴权制作
//         $ak = config('filesystems.disks.qiniu.access_key');
//         $sk = config('filesystems.disks.qiniu.secret_key');
//         //vendor/qiniu/php-sdk/src/Qiniu/Auth.php
//         $auth = new \Qiniu\Auth($ak, $sk);
//         //制作鉴权
//         //Qiniu 2t9rE0m_fRDtvrahjNA-uAAYL17TShcNSJTD07iH:ldeGNvrpiU70IouKfW4del0ISWs=
//         $token = "Qiniu " . $auth->sign($signdata);

//         //利用guzzlehttp实现七牛云平台跨域请求
//         $guzzle = new \GuzzleHttp\Client();  //实例化guzzle对象
//         $res = $guzzle->request(
//             $method,
//             $host . $path,
//             [
//                 'headers' => [
//                     'User-Agent' => 'pili-sdk-go/v2 go1.6 darwin/amd64',
//                     'Content-Length' => strlen($body),
//                     'Authorization' => $token,
//                     'Content-Type' => 'application/json',
//                     'Accept-Encoding' => 'gzip',
//                 ],
//                 'body' => $body,
//             ]
//         ); */
//         //$code = $res->getStatusCode();  //获取返回状态码,200->ok,614->直播流重复
//         //存储直播流数据到数据库
//         Stream::create($shuju);
//         return ['success' => true];
//     } else {
//         //校验失败
//         $errorinfo = collect($validator->messages())->implode('0', '|');
//         return ['success' => false, 'errorinfo' => $errorinfo];
//     }
// }