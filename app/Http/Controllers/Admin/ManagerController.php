<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Manager;
use App\Http\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    /**
     * 管理员登录系统
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        //用户处于登录状态，如果再次请求该地方，则直接使其进入系统
        if(\Auth::guard('back')->check()){
            return redirect('admin/index/index');
        }

        if($request->isMethod('post')){
            //管理员登录系统

            //账号和密码"非空"的校验
            $rules = [
                'mg_name'=>'required',
                'password'=>'required',
                'verify_code'=>'required|captcha',
            ];
            $notices = [
                'mg_name.required'=>'账号必须填写',
                'password.required'=>'密码必须填写',
                'verify_code.required'=>'验证码必填',
                'verify_code.captcha'=>'验证码错误',
            ];
            $validator = \Validator::make($request->all(),$rules,$notices);
            if($validator->passes()){
                //校验成功，判断用户名和密码是否正确，并做页面跳转
                $name_pwd = $request->only(['mg_name','password']);

                //给attempt方法设置第二个参数，表明是否要有“使我保持登录状态”的标识
                if(\Auth::guard('back')->attempt($name_pwd,$request->input('online'))){
                    //用户名和密码正确
                    return redirect('admin/index/index');
                }else{
                    //用户名和密码错误
                    //跳转回登录页，同时把错误信息、输入信息回传
                    return redirect('admin/manager/login')
                        ->withErrors(['errorinfo'=>'用户名或密码错误'])
                        ->withInput();
                }

            }else{
                //校验失败，跳转回登录页，同时把错误信息、输入信息回传
                return redirect('admin/manager/login')
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        return view('admin/manager/login');
    }

    /**
     * 管理员退出系统
     * @param Request $request
     */
    public function logout(Request $request)
    {
        \Auth::guard('back')->logout();//清除session
        return redirect('admin/manager/login');//页面重定向到登录页
    }

    /**
     * 管理员列表
     * @param Request $request
     */
    public function index(Request $request)
    {
        $info = Manager::where('mg_id','>',1)->with('role')->paginate(6);
//        dd($info);
        return view('admin/manager/index',compact('info'));
    }
}