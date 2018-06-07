<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Yypyfangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PeiyangController extends Controller
{
    public function index(Request $request)
    {
        $cnt = Yypyfangan::count();

        if ($request->isMethod("post")) {

            // $shuju = Lesson::get();
            //A. 数据分页(显示条数)
            $offset = $request->input('start');
            $len = $request->input('length');

            //B. 排序
            $n = $request->input('order.0.column');//获得排序字段的序号
            $duan = $request->input('columns.' . $n . '.data');//获得排序的字段
            // $san = $request->input('columns.' . $n . '.data');//获得排序的字段
            $xu = $request->input('order.0.dir');  //排序的顺序asc/desc

            //C. 模糊检索(课时名称 和 课时描述)
            $search = $request->input('search.value');//获得检索的条件值

            $kcxq_id = $request->input('kechengxq');//获得检索的条件值
            $kcpt_id = $request->input('kechengpt');//获得检索的条件值
            $kclb_id = $request->input('kechenglb');//获得检索的条件值
            $jxfx_id = $request->input('jiaoxuefx');//获得检索的条件值
            $shuju = Yypyfangan::select()->offset($offset)
                ->limit($len)
                ->orderBy($duan, $xu)
//                ->with(['banji'=>function($query){
//                    $query->where('banji.bj_name', 'like', "%14%");
//                }])
                ->with('jiaoxuefx')
                ->with('kechengpt')
                ->with('kechengxq')
                ->with('kechenglb')
                ->with('zhuanyedm')
                ->where('kcnum', 'like', "%$search%")
                ->orWhere('kcname', 'like', "%$search%")
                ->orWhere('khfs', 'like', "%$search%")
                ->get(); //数据本身是一个集合，里边每个单元都是一个小的lesson对象

            if ($jxfx_id !== '0' || $kcxq_id !== '0' || $kcpt_id !== '0' || $kclb_id !== '0'){
                $shuju = Yypyfangan::select()->offset($offset)
                    ->limit($len)
                    ->orderBy($duan, $xu)
//                ->with(['banji'=>function($query){
//                    $query->where('banji.bj_name', 'like', "%14%");
//                }])
                    ->with('jiaoxuefx')
                    ->with('kechengpt')
                    ->with('kechengxq')
                    ->with('kechenglb')
                    ->with('zhuanyedm')
                    ->where(function($query) use($request,$jxfx_id){
                        if ($jxfx_id !== '0' ){//(1)
                            $query->where('jxfx_id', $jxfx_id);
                        }
                    })
                    ->where(function($query) use($request,$jxfx_id,$kcxq_id,$kcpt_id,$kclb_id) {
                        //$jxfx_id !== '0'  上文已判断 此处可不判断 与上文(1)已排列组合的方式进行(3)
                        if ($jxfx_id !== '0' &&  $kcxq_id !== '0' && $kcpt_id !== '0' && $kclb_id !== '0') {
                            $query->where('kcxq_id', $kcxq_id)
                                  ->where('kcpt_id', $kcpt_id)
                                  ->where('kclb_id', $kclb_id);
                        }elseif ($jxfx_id !== '0' &&  $kcxq_id !== '0' && $kcpt_id !== '0'){
                                $query->where('kcxq_id', $kcxq_id)
                                        ->where('kcpt_id', $kcpt_id);
                        }elseif ($jxfx_id !== '0' &&  $kcxq_id !== '0' && $kclb_id !== '0'){
                            $query->where('kcxq_id', $kcxq_id)
                                ->where('kclb_id', $kclb_id);
                        }elseif ($jxfx_id !== '0' &&  $kcpt_id !== '0' && $kclb_id !== '0'){
                            $query->where('kcpt_id', $kcpt_id)
                                ->where('kclb_id', $kclb_id);
                        }elseif ($kcxq_id !== '0'){
                            $query->where('kcxq_id', $kcxq_id);
                        }elseif ($kcpt_id !== '0'){
                            $query->where('kcpt_id', $kcpt_id);
                        }elseif($kclb_id !== '0'){
                            $query->where('kclb_id', $kclb_id);;
                        }
                    })
                    ->get(); //数据本身是一个集合，里边每个单元都是一个小的lesson对象
            }

            $info = [
                'draw' => $request->get('draw'),
                'recordsTotal' => $cnt,
                'recordsFiltered' => $cnt,
                'data' => $shuju,
            ];
            return $info;
        }
        //教学方向
        $jiaoxuefx = DB::table('jiaoxuefx')->pluck('jxfx_name','jxfx_id')->toArray();
        //课程类别
        $kechenglb = DB::table('kechenglb')->pluck('kclb_name','kclb_id')->toArray();
        //课程类别
        $kechengpt = DB::table('kechengpt')->pluck('kcpt_name','kcpt_id')->toArray();
        //课程学期
        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
//        //专业代码
//        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
        return view('admin/peiyang/index',compact('cnt','jiaoxuefx','kechengxq','kechengpt','kechenglb'));
    }

    /**
     * 添加培养信息
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tianjia(Request $request)
    {

        if ($request->isMethod('post')) {
            $formData = $request->all();
            // dd($formData);
            //数据校验
            $rules = [
                'zy_id' => 'required',
                'jxfx_id' => 'required',
                'kcpt_id' => 'required',
                'kclb_id' => 'required',
                'kcxq_id' => 'required',
                'kcnum' => 'required',
                'kcname' => 'required',
            ];
            $notices = [
                'zy_id.required' => '专业编号必须设置',
                'jxfx_id.required' => '教学方向必须选择',
                'kcpt_id.required' => '课程平台必须选择',
                'kcxq_id.required' => '学期必须选择',
                'kclb_id.required' => '课程类别必须选择',
                'kcnum.required' => '课程编号必须设置',
                'kcname.required' => '课程名称必须设置',

            ];
            $validator = Validator::make($formData, $rules, $notices);
            if ($validator->passes()) {
                    Yypyfangan::create($formData);
                    return ['success' => true];
            } else {
                $errorinfo = collect($validator->messages())->implode('0', ' | ');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }

        //教学方向
        $jiaoxuefx = DB::table('jiaoxuefx')->pluck('jxfx_name','jxfx_id')->toArray();
        //课程类别
        $kechenglb = DB::table('kechenglb')->pluck('kclb_name','kclb_id')->toArray();
        //课程类别
        $kechengpt = DB::table('kechengpt')->pluck('kcpt_name','kcpt_id')->toArray();
        //课程学期
        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
          //专业代码
          $zhuanyedm = DB::table('zhuanyedm')->pluck('zy_daima','zy_id')->toArray();
        return view('admin/peiyang/tianjia',
            ['jiaoxuefx' => $jiaoxuefx,
                'kechenglb' => $kechenglb,
                'kechengpt' => $kechengpt,
                'kechengxq' => $kechengxq,
                'zhuanyedm' => $zhuanyedm
            ]);
    }

    /**
     * 添加培养信息
     * @param Request $request
     * @param Yypyfangan $yypyfangan
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function xiugai(Request $request,Yypyfangan $yypyfangan)
    {

        if ($request->isMethod('post')) {
            $formData = $request->all();
            // dd($formData);
            //数据校验
            $rules = [
                'zy_id' => 'required',
                'jxfx_id' => 'required',
                'kcpt_id' => 'required',
                'kclb_id' => 'required',
                'kcxq_id' => 'required',
                'kcnum' => 'required',
                'kcname' => 'required',
            ];
            $notices = [
                'zy_id.required' => '专业编号必须设置',
                'jxfx_id.required' => '教学方向必须选择',
                'kcpt_id.required' => '课程平台必须选择',
                'kcxq_id.required' => '学期必须选择',
                'kclb_id.required' => '课程类别必须选择',
                'kcnum.required' => '课程编号必须设置',
                'kcname.required' => '课程名称必须设置',

            ];
            $validator = Validator::make($formData, $rules, $notices);
            if ($validator->passes()) {
                $yypyfangan::updated($formData);
                return ['success' => true];
            } else {
                $errorinfo = collect($validator->messages())->implode('0', ' | ');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }

        //教学方向
        $jiaoxuefx = DB::table('jiaoxuefx')->pluck('jxfx_name','jxfx_id')->toArray();
        //课程类别
        $kechenglb = DB::table('kechenglb')->pluck('kclb_name','kclb_id')->toArray();
        //课程类别
        $kechengpt = DB::table('kechengpt')->pluck('kcpt_name','kcpt_id')->toArray();
        //课程学期
        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
        //专业代码
        $zhuanyedm = DB::table('zhuanyedm')->pluck('zy_daima','zy_id')->toArray();
        return view('admin/peiyang/xiugai',
            [   'yypyfangan'=>$yypyfangan,
                'jiaoxuefx' => $jiaoxuefx,
                'kechenglb' => $kechenglb,
                'kechengpt' => $kechengpt,
                'kechengxq' => $kechengxq,
                'zhuanyedm' => $zhuanyedm
            ]);
    }

    /**
     * 删除单个学生信息
     * @param Request $request
     * @param Yypyfangan $yypyfangan
     * @return array
     * @throws \Exception
     */
    public function del(Request $request,Yypyfangan $yypyfangan)
    {
//         dd($yypyfangan);
        if ($request->isMethod('get')) {
            $z = $yypyfangan->delete();
            if ($z) {
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        }
        exit;
    }

    public function delAll(Request $request)
    {
        if ($request->isMethod('post')){
            $dels = $request->input('delAll');
            $z = DB::table('yypyfangan')->whereIn('id',$dels)->delete();
//            $z = DB::table('student')->delete($dels);
//            dd($z);
            if ($z) {
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        }
        exit;
    }
}
