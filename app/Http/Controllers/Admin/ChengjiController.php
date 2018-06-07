<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Chengji;
use App\Http\Models\Yypyfangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
class ChengjiController extends Controller
{


    public function index(Request $request)
    {
        $cnt = Chengji::count();

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
            $bj_id = $request->input('banji');//获得检索的条件值
            $shuju = Chengji::select()->offset($offset)
                ->limit($len)
                ->orderBy($duan, $xu)
//                ->with(['banji'=>function($query){
//                    $query->where('banji.bj_name', 'like', "%14%");
//                }])
                ->with('banji')
                ->with('kechengpt')
                ->with('kechengxq')
                ->with('kechenglb')
                ->where(function ($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search){
                    if ($bj_id !== '0' || $kcxq_id !== '0' || $kcpt_id !== '0' || $kclb_id !== '0'){

                        $query->where(function($query) use($request,$bj_id){
                            if ($bj_id !== '0' ){//(1)
                                $query->where('bj_id', $bj_id);
                            }
                        })
                            ->where(function($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search) {
                                //$bj_id !== '0'  上文已判断 此处可不判断 与上文(1)已排列组合的方式进行(3)
                                if ($kcxq_id !== '0' && $kcpt_id !== '0' && $kclb_id !== '0') {
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('kcpt_id', $kcpt_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ( $kcxq_id !== '0' && $kcpt_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('kcpt_id', $kcpt_id);
                                }elseif ($kcxq_id !== '0' && $kclb_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ( $kcpt_id !== '0' && $kclb_id !== '0'){
                                    $query->where('kcpt_id', $kcpt_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ($kcxq_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id);
                                }elseif ($kcpt_id !== '0'){
                                    $query->where('kcpt_id', $kcpt_id);
                                }elseif($kclb_id !== '0'){
                                    $query->where('kclb_id', $kclb_id);
                                }
                            })->where(function ($query) use($request,$search){
                                $query->where('kcnum', 'like', "%$search%")
                                    ->orWhere('kcname', 'like', "%$search%")
                                    ->orWhere('stuId', 'like', "%$search%")
                                    ->orWhere('name', 'like', "%$search%");
                            });
                    }else{
                        $query->where('kcnum', 'like', "%$search%")
                            ->orWhere('kcname', 'like', "%$search%")
                            ->orWhere('stuId', 'like', "%$search%")
                            ->orWhere('name', 'like', "%$search%");

                    }
                })->get(); //数据本身是一个集合，里边每个单元都是一个小的lesson对象

            //测试出实际数量
                $cnt = Chengji::with('banji')
                    ->with('kechengpt')
                    ->with('kechengxq')
                    ->with('kechenglb')
                    ->where(function ($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search){
                        if ($bj_id !== '0' || $kcxq_id !== '0' || $kcpt_id !== '0' || $kclb_id !== '0'){

                            $query->where(function($query) use($request,$bj_id){
                                if ($bj_id !== '0' ){//(1)
                                    $query->where('bj_id', $bj_id);
                                }
                            })
                                ->where(function($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search) {
                                    //$bj_id !== '0'  上文已判断 此处可不判断 与上文(1)已排列组合的方式进行(3)
                                    if ($kcxq_id !== '0' && $kcpt_id !== '0' && $kclb_id !== '0') {
                                        $query->where('kcxq_id', $kcxq_id)
                                            ->where('kcpt_id', $kcpt_id)
                                            ->where('kclb_id', $kclb_id);
                                    }elseif ( $kcxq_id !== '0' && $kcpt_id !== '0'){
                                        $query->where('kcxq_id', $kcxq_id)
                                            ->where('kcpt_id', $kcpt_id);
                                    }elseif ($kcxq_id !== '0' && $kclb_id !== '0'){
                                        $query->where('kcxq_id', $kcxq_id)
                                            ->where('kclb_id', $kclb_id);
                                    }elseif ( $kcpt_id !== '0' && $kclb_id !== '0'){
                                        $query->where('kcpt_id', $kcpt_id)
                                            ->where('kclb_id', $kclb_id);
                                    }elseif ($kcxq_id !== '0'){
                                        $query->where('kcxq_id', $kcxq_id);
                                    }elseif ($kcpt_id !== '0'){
                                        $query->where('kcpt_id', $kcpt_id);
                                    }elseif($kclb_id !== '0'){
                                        $query->where('kclb_id', $kclb_id);
                                    }
                                })->where(function ($query) use($request,$search){
                                    $query->where('kcnum', 'like', "%$search%")
                                        ->orWhere('kcname', 'like', "%$search%")
                                        ->orWhere('stuId', 'like', "%$search%")
                                        ->orWhere('name', 'like', "%$search%");
                                });
                        }else{
                            $query->where('kcnum', 'like', "%$search%")
                                ->orWhere('kcname', 'like', "%$search%")
                                ->orWhere('stuId', 'like', "%$search%")
                                ->orWhere('name', 'like', "%$search%");

                        }
                    })->count();

            //测试出实际数量
            $cjData= Chengji::with('banji')
                ->with('kechengpt')
                ->with('kechengxq')
                ->join('banji', function ($join) {
                    $join->on('chengji.bj_id', '=', 'banji.bj_id');
                })
                ->join('kechengpt', function ($join) {
                    $join->on('chengji.kcpt_id', '=', 'kechengpt.kcpt_id');
                })
                ->with('kechenglb')->select('banji.bj_name','stuId','name','kcname','kechengpt.kcpt_name','score','beizhu')
                ->where(function ($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search){
                    if ($bj_id !== '0' || $kcxq_id !== '0' || $kcpt_id !== '0' || $kclb_id !== '0'){

                        $query->where(function($query) use($request,$bj_id){
                            if ($bj_id !== '0' ){//(1)
                                $query->where('chengji.bj_id', $bj_id);
                            }
                        })
                            ->where(function($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search) {
                                //$bj_id !== '0'  上文已判断 此处可不判断 与上文(1)已排列组合的方式进行(3)
                                if ($kcxq_id !== '0' && $kcpt_id !== '0' && $kclb_id !== '0') {
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('chengji.kcpt_id', $kcpt_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ( $kcxq_id !== '0' && $kcpt_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('chengji.kcpt_id', $kcpt_id);
                                }elseif ($kcxq_id !== '0' && $kclb_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ( $kcpt_id !== '0' && $kclb_id !== '0'){
                                    $query->where('chengji.kcpt_id', $kcpt_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ($kcxq_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id);
                                }elseif ($kcpt_id !== '0'){
                                    $query->where('chengji.kcpt_id', $kcpt_id);
                                }elseif($kclb_id !== '0'){
                                    $query->where('kclb_id', $kclb_id);
                                }
                            })->where(function ($query) use($request,$search){
                                $query->where('kcnum', 'like', "%$search%")
                                    ->orWhere('kcname', 'like', "%$search%")
                                    ->orWhere('stuId', 'like', "%$search%")
                                    ->orWhere('name', 'like', "%$search%");
                            });
                    }else{
                        $query->where('kcnum', 'like', "%$search%")
                            ->orWhere('kcname', 'like', "%$search%")
                            ->orWhere('stuId', 'like', "%$search%")
                            ->orWhere('name', 'like', "%$search%");

                    }
                })->get()->toArray();
//                $cj = [];
//            $cjData'stuId','name','kcname','kechengpt.kcpt_name','score','beizhu'
//            foreach ($cjData as $k => $v){
//                $cj[$k]=$v['bj_name'];
//                $cj[$k]=$v['stuId'];
//                $cj[$k]=$v['name'];
//                $cj[$k]=$v['kcname'];
//                $cj[$k]=$v['kechengpt'];
//                $cj[$k]=$v['kcpt_name'];
//                $cj[$k]=$v['score'];
//                $cj[$k]=$v['beizhu'];
//            }
            $info = [
                'draw' => $request->get('draw'),
                'recordsTotal' => $cnt,
                'recordsFiltered' => $cnt,
                'data' => $shuju,
                'cjData'=>$cjData,
//                'cj'=>$cj,
            ];

            return $info;
        }
        //教学方向
        $banji = DB::table('banji')->pluck('bj_name','bj_id')->toArray();
        //课程类别
        $kechenglb = DB::table('kechenglb')->pluck('kclb_name','kclb_id')->toArray();
        //课程类别
        $kechengpt = DB::table('kechengpt')->pluck('kcpt_name','kcpt_id')->toArray();
        //课程学期
        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
//        //专业代码
//        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
        return view('admin/chengji/index',compact('cnt','banji','kechengxq','kechengpt','kechenglb'));
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
                'kcxq_id' => 'required',
                'bj_id' => 'required',
                'kcpt_id' => 'required',
                'kclb_id' => 'required',
                'stuId' => 'required',
                'kcname' => 'required',
                'name' => 'required',
                'score' => 'required',
            ];
            $notices = [
                'kcxq_id.required' => '学期必须选择',
                'bj_id.required' => '班级必须选择',
                'kcpt_id.required' => '课程性质必须选择',
                'kclb_id.required' => '课程类别必须选择',
                'stuId.required' => '学号必须设置',
                'kcname.required' => '课程名称必须设置',
                'name.required' => '姓名必须设置',
                'score.required' => '分数必须设置',

            ];
            $validator = Validator::make($formData, $rules, $notices);
            if ($validator->passes()) {
                    Chengji::create($formData);
                    return ['success' => true];
            } else {
                $errorinfo = collect($validator->messages())->implode('0', ' | ');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }

        //教学方向
        $banji = DB::table('banji')->pluck('bj_name','bj_id')->toArray();
        //课程类别
        $kechenglb = DB::table('kechenglb')->pluck('kclb_name','kclb_id')->toArray();
        //课程类别
        $kechengpt = DB::table('kechengpt')->pluck('kcpt_name','kcpt_id')->toArray();
        //课程学期
        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();

        return view('admin/chengji/tianjia',
            [
                'kechenglb' => $kechenglb,
                'kechengpt' => $kechengpt,
                'kechengxq' => $kechengxq,
                'banji' => $banji
            ]);
    }

    /**
     * 修改培养信息
     * @param Request $request
     * @param Chengji $chengji
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function xiugai(Request $request,Chengji $chengji)
    {

        if ($request->isMethod('post')) {
            $formData = $request->all();
            // dd($formData);
            //数据校验
            $rules = [
                'kcxq_id' => 'required',
                'bj_id' => 'required',
                'kcpt_id' => 'required',
                'kclb_id' => 'required',
                'stuId' => 'required',
                'kcname' => 'required',
                'name' => 'required',
                'score' => 'required',
            ];
            $notices = [
                'kcxq_id.required' => '学期必须选择',
                'bj_id.required' => '班级必须选择',
                'kcpt_id.required' => '课程性质必须选择',
                'kclb_id.required' => '课程类别必须选择',
                'stuId.required' => '学号必须设置',
                'kcname.required' => '课程名称必须设置',
                'name.required' => '姓名必须设置',
                'score.required' => '分数必须设置',

            ];
            $validator = Validator::make($formData, $rules, $notices);
            if ($validator->passes()) {
                $chengji::updated($formData);
                return ['success' => true];
            } else {
                $errorinfo = collect($validator->messages())->implode('0', ' | ');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }


        //班级
        $banji = DB::table('banji')->pluck('bj_name','bj_id')->toArray();
        //课程类别
        $kechenglb = DB::table('kechenglb')->pluck('kclb_name','kclb_id')->toArray();
        //课程类别
        $kechengpt = DB::table('kechengpt')->pluck('kcpt_name','kcpt_id')->toArray();
        //课程学期
        $kechengxq = DB::table('kechengxq')->pluck('kcxq_name','kcxq_id')->toArray();
        return view('admin/chengji/xiugai',
            [   'kechenglb' => $kechenglb,
                'kechengpt' => $kechengpt,
                'kechengxq' => $kechengxq,
                'banji' => $banji,
                'chengji' => $chengji
            ]);
    }

    /**
     * 删除单个成绩信息
     * @param Request $request
     * @param Chengji $chengji
     * @return array
     * @throws \Exception
     */
    public function del(Request $request,Chengji $chengji)
    {
        if ($request->isMethod('get')) {
            $z = $chengji->delete();
            if ($z) {
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        }
        exit;
    }

    /**
     * 多个选择删除
     * @param Request $request
     * @return array
     */
    public function delAll(Request $request)
    {
        if ($request->isMethod('post')){
            $dels = $request->input('delAll');
            $z = DB::table('chengji')->whereIn('id',$dels)->delete();
            if ($z) {
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        }
        exit;
    }
    //Excel文件导出功能
    public function daoChu(Request $request)
    {


            $kcxq_id = $request->input('kechengxq');//获得检索的条件值
            $kcpt_id = $request->input('kechengpt');//获得检索的条件值
            $kclb_id = $request->input('kechenglb');//获得检索的条件值
            $bj_id = $request->input('banji');//获得检索的条件值
            $search = '';//获得检索的条件值
            //测试出实际
            $cjData= Chengji::with('banji')
                ->with('kechengpt')
                ->with('kechengxq')
                ->join('banji', function ($join) {
                    $join->on('chengji.bj_id', '=', 'banji.bj_id');
                })
                ->join('kechengpt', function ($join) {
                    $join->on('chengji.kcpt_id', '=', 'kechengpt.kcpt_id');
                })
                ->with('kechenglb')->select('banji.bj_name','stuId','name','kcname','kechengpt.kcpt_name','score','beizhu')
                ->where(function ($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search){
                    if ($bj_id !== '0' || $kcxq_id !== '0' || $kcpt_id !== '0' || $kclb_id !== '0'){

                        $query->where(function($query) use($request,$bj_id){
                            if ($bj_id !== '0' ){//(1)
                                $query->where('chengji.bj_id', $bj_id);
                            }
                        })
                            ->where(function($query) use($request,$bj_id,$kcxq_id,$kcpt_id,$kclb_id,$search) {
                                //$bj_id !== '0'  上文已判断 此处可不判断 与上文(1)已排列组合的方式进行(3)
                                if ($kcxq_id !== '0' && $kcpt_id !== '0' && $kclb_id !== '0') {
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('chengji.kcpt_id', $kcpt_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ( $kcxq_id !== '0' && $kcpt_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('chengji.kcpt_id', $kcpt_id);
                                }elseif ($kcxq_id !== '0' && $kclb_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ( $kcpt_id !== '0' && $kclb_id !== '0'){
                                    $query->where('chengji.kcpt_id', $kcpt_id)
                                        ->where('kclb_id', $kclb_id);
                                }elseif ($kcxq_id !== '0'){
                                    $query->where('kcxq_id', $kcxq_id);
                                }elseif ($kcpt_id !== '0'){
                                    $query->where('chengji.kcpt_id', $kcpt_id);
                                }elseif($kclb_id !== '0'){
                                    $query->where('kclb_id', $kclb_id);
                                }
                            })->where(function ($query) use($request,$search){
                                $query->where('kcnum', 'like', "%$search%")
                                    ->orWhere('kcname', 'like', "%$search%")
                                    ->orWhere('stuId', 'like', "%$search%")
                                    ->orWhere('name', 'like', "%$search%");
                            });
                    }else{
                        $query->where('kcnum', 'like', "%$search%")
                            ->orWhere('kcname', 'like', "%$search%")
                            ->orWhere('stuId', 'like', "%$search%")
                            ->orWhere('name', 'like', "%$search%");

                    }
                })->get()->toArray();
//                dd($cjData);
            //        $cj = $request->session()->pull('cjData');
        Excel::create('成绩信息'.date('Y-m-d H_i_s'),function($excel) use ($cjData){
            $excel->sheet('score', function($sheet) use ($cjData){
                $sheet->rows($cjData);
                ob_end_clean();
            });

        })->export('xls');//cs
        }


}
