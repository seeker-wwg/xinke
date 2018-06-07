<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * 权限列表展示
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //获得权限列表信息
        $shuju = Permission::get();
        //dd($shuju);
        //$shuju = collection{Permission对象,Permission对象,Permission对象,Permission对象,..}
        $shuju = $shuju->toArray();  //把信息组织为数组的格式，因为generateTree()要求数组信息传递
        //dd($shuju);  //[[具体权限数据],[具体权限数据],[具体权限数据],[具体权限数据]..]

        $info = generateTree($shuju);
        //dd($info);  //权限已经被组织为正确的上下级关系，但是已经变为"纯数组"了


        return view('admin/permission/index',compact('info'));//调用模板，并传递权限列表信息
    }

    /**
     * 添加权限
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tianjia(Request $request)
    {
        if($request->isMethod('post')){
            //表单验证
            $rules = ['ps_name'=>'required',];
            $notices = ['ps_name.required' => '权限名称必须设置',];
            $form_data = $request->all();
            $validator = \Validator::make($form_data,$rules,$notices);

            if($validator->passes()){
                //通过验证
                //存储权限入库(名称、上级、控制器、操作方法、路由、等级)

                //制作权限的“等级”
                if($form_data['ps_pid']!=0){
                    $pinfo = Permission::find($form_data['ps_pid']);//获取上级权限信息
                    $form_data['ps_level'] = (string)($pinfo['ps_level']+1); //Int--->String
                }else{
                    $form_data['ps_level'] = '0';
                }
                $newobj = Permission::create($form_data); //会返回新记录的model模型对象
                if($newobj){
                    return ['success'=>true];
                }
            }else{
                //未通过验证
                $errorinfo = collect($validator->messages())->implode('0','|');
                return ['success'=>false,'errorinfo'=>$errorinfo];
            }
        }

        //获取可供选取的1、2级别权限，再按照上下级排序
        $permission = generateTree(Permission::whereIn('ps_level',['0','1'])->get()->toArray());

        return view('admin/permission/tianjia',compact('permission'));
    }
}