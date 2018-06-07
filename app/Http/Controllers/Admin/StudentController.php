<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Course;
use App\Http\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        $cnt = Student::count();
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

            $bj_id = $request->input('bj_id');//获得检索的条件值
            $zm_id = $request->input('zm_id');//获得检索的条件值
            $shuju = Student::select()->offset($offset)
                ->limit($len)
                ->orderBy($duan, $xu)
//                ->with(['banji'=>function($query){
//                    $query->where('banji.bj_name', 'like', "%14%");
//                }])
                ->with('banji')
                ->where('stuId', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")
                ->get(); //数据本身是一个集合，里边每个单元都是一个小的lesson对象
            if ($bj_id !== '0' || $zm_id !== '0'){
                $shuju = Student::select()->offset($offset)
                    ->limit($len)
                    ->orderBy($duan, $xu)
//                ->with(['banji'=>function($query){
//                    $query->where('banji.bj_name', 'like', "%14%");
//                }])
                    ->with('banji')
                    ->where('bj_id',$bj_id)
                    ->where(function($query) use($request,$bj_id,$zm_id) {
                        if ($bj_id !== '0' &&  $zm_id !== '0') {
                            $query->where('zm_id', $zm_id);
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
        $xueli = DB::table('xueli')->pluck('xl_name', 'xl_id')->toArray();
        $banji = DB::table('banji')->pluck('bj_name', 'bj_id')->toArray();
        $zzmm = DB::table('zzmm')->pluck('zm_name', 'zm_id')->toArray();

        return view('admin/student/index',compact('cnt','banji','xueli','zzmm'));
    }


    public function tianjia(Request $request)
    {

        if ($request->isMethod('post')) {
            $formData = $request->all();
            // dd($formData);
            //数据校验
            $rules = [
                'name' => 'required',
                 'stuId' => 'required',
                 'sex' => 'required',
                 'nation' => 'required',
                 'numId' => 'required',
                 'csny' => 'required',
                 'zm_id' => 'required',
                 'xl_id' => 'required',
                'bj_id' => 'required',

                // 'lesson_duration' => ['required', 'regex:/^[1-9][1-9]\d$/'],
                'numId' => ['regex:/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/'],
                'tel' => ['regex:/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/'],

            ];
            $notices = [
                'name.required' => '学生名称必须设置',
                'stuId.required' => '学生学号必须设置',
                'sex.required' => '年龄必须设置',
                'nation.required' => '民族必须设置',
                'numId.regex' => '请输入正确身份证号',
                'tel.regex' => '请输入正确手机号',
                'zm_id.required' => '政治面貌必须选择',
                'xl_id.required' => '学历必须选择',
                'bj_id.required' => '班级必须选择',
            ];
            $validator = Validator::make($formData, $rules, $notices);
            if ($validator->passes()) {
//                dd( Student::where('tel',$formData['tel'])->count());
                if (Student::where('stuId',$formData['stuId'])->count() || Student::where('tel',$formData['tel'])->count()) {
                    $errorinfo="学号或手机号已存在";
                    return ['success' => false, "errorinfo" => $errorinfo];
                }else{
                    Student::create($formData);
                    return ['success' => true];
                }

            } else {
                $errorinfo = collect($validator->messages())->implode('0', '|');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }
        // $teacher = DB::table('teacher')->pluck('teacher_name', 'teacher_id')->toArray();
        // dd($teacher);

        $xueli = DB::table('xueli')->pluck('xl_name', 'xl_id')->toArray();
        $banji = DB::table('banji')->pluck('bj_name', 'bj_id')->toArray();
        $zzmm = DB::table('zzmm')->pluck('zm_name', 'zm_id')->toArray();
        return view('admin/student/tianjia', ['xueli' => $xueli, 'banji' => $banji,'zzmm' => $zzmm]);
    }


    //修改
    public function xiugai(Request $request, Student $student)
    {

        if ($request->isMethod('post')) {
            $formData = $request->all();
            // dd($formData);
            //数据校验
            $rules = [
                'name' => 'required',
                'stuId' => 'required',
                'sex' => 'required',
                'nation' => 'required',
                'numId' => 'required',
                'csny' => 'required',
                'zm_id' => 'required',
                'xl_id' => 'required',
                'bj_id' => 'required',

                // 'lesson_duration' => ['required', 'regex:/^[1-9][1-9]\d$/'],
                'numId' => ['regex:/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/'],
                'tel' => ['regex:/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/'],

            ];
            $notices = [
                'name.required' => '学生名称必须设置',
                'stuId.required' => '学生学号必须设置',
                'sex.required' => '年龄必须设置',
                'nation.required' => '民族必须设置',
                'numId.regex' => '请输入正确身份证号',
                'tel.regex' => '请输入正确手机号',
                'zm_id.required' => '政治面貌必须选择',
                'xl_id.required' => '学历必须选择',
                'bj_id.required' => '班级必须选择',
            ];
            $validator = Validator::make($formData, $rules, $notices);
            if ($validator->passes()) {
//                dd( Student::where('id','!=',$student->id)->where('stuId',$formData['stuId'])->count());????
//                dd( (Student::where('stuId',$formData['stuId'])->count() || Student::where('tel',$formData['tel'])->count()) &&
//                    (($student->stuId !== $formData['stuId']) || ($student->tel !== $formData['tel'])) );
                if ((Student::where('stuId',$formData['stuId'])->count() || Student::where('tel',$formData['tel'])->count()) &&
                    (($student->stuId !== $formData['stuId']) || ($student->tel !== $formData['tel'])) ) {
                    $errorinfo="学号或手机号已存在";
                    return ['success' => false, "errorinfo" => $errorinfo];
                }else{
                    $student->update($formData);
                    return ['success'=>true];
                }

            } else {
                $errorinfo = collect($validator->messages())->implode('0', '|');
                return ['success' => false, "errorinfo" => $errorinfo];
            }
        }
        $xueli = DB::table('xueli')->pluck('xl_name', 'xl_id')->toArray();
        $banji = DB::table('banji')->pluck('bj_name', 'bj_id')->toArray();
        $zzmm = DB::table('zzmm')->pluck('zm_name', 'zm_id')->toArray();
        return view('admin/student/xiugai', ['student'=>$student,'xueli' => $xueli, 'banji' => $banji,'zzmm' => $zzmm]);

    }

    /**
     * 删除单个学生信息
     * @param Request $request
     * @param Student $student
     * @return array
     * @throws \Exception
     */
    public function del(Request $request, Student $student)
    {
        // dd($id);
        if ($request->isMethod('get')) {
            $z = $student->delete();
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
            $z = DB::table('student')->whereIn('id',$dels)->delete();
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
