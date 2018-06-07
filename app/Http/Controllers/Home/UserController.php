<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Student;

class UserController extends Controller
{
    /**
     * 学生用户登录系统
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {

        if ($request->isMethod('post')){

            //用户名、密码的校验
            $rules = [
                'std_name'=>'required',
                'password'=>'required',
            ];
            $notices = [
                'std_name.required' => '用户名必填',
                'password.required' => '密码必填',
            ];
            $form_data = $request->all(); //收集form表单全部数据
            $validator = \Validator::make($form_data,$rules,$notices);
            if($validator->passes()){
//                $cnt = Student::where('name','王文广')->count();
//                dd(Student::where('name','王文广')->count());
                //验证通过
                //用户名和密码校验
                $name_pwd = $request->only(['std_name','password']);
//                dd(Student::where('stuId',$name_pwd['password'])->count());
//                if(Student::where('name',$name_pwd['std_name'])->count() && Student::where('stuId',$name_pwd['password'])->count()){
                if(\Auth::guard('front')->attempt($name_pwd)){
                    return redirect('/');   //前台首页面跳转
                }else{
                    return redirect('home/user/login')
                        ->withErrors(['errorinfo'=>'用户名或密码错误'])
                        ->withInput();
                }
            }else{
                //验证未通过
                return redirect('home/user/login')
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        return view('home/user/login');
    }
}
