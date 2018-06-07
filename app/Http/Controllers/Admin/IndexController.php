<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Manager;
use App\Http\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //根据管理员的角色获取对应的操作权限
        $mg_id = \Auth::guard('back')->user()->mg_id;  //管理员登录会话的mg_id session的信息

        try{
            //③ 有正常分配角色的普通管理员(根据角色分配权限)
            //使得Manager根据"关系role"获得对应的数据
            $ps_ids = Manager::find($mg_id)->role->ps_ids;
            //select * from `edu_manager` where `edu_manager`.`mg_id` = '2' and `edu_manager`.`deleted_at` is null limit 1
            //select * from `edu_role` where `edu_role`.`role_id` = '30' and `edu_role`.`role_id` is not null and `edu_role`.`deleted_at` is null limit 1
            //dd($ps_ids);//"101,104,102,107"  获得到角色拥有的权限的ids信息
            $ps_ids = explode(',',$ps_ids);  //array(101,104,102,107)

            //根据$ps_ids获得对应的操作权限,1、2级别权限分别获取
            $permission_A = Permission::where('ps_level','0')
                ->whereIn('ps_id',$ps_ids)
                ->get();
            $permission_B = Permission::where('ps_level','1')
                ->whereIn('ps_id',$ps_ids)
                ->get();
        }catch(\Exception $e){
            //异常处理
            if($mg_id==1){
                //① 超级管理员root(分配全部的权限)
                $permission_A = Permission::where('ps_level','0')->get();
                $permission_B = Permission::where('ps_level','1')->get();
            }else{
                //② 未分配角色的普通管理员(分配0个权限)
                $permission_A = [];
                $permission_B = [];
            }
        }


        return view('admin/index/index',compact('permission_A','permission_B','mg_id'));
    }

    /**
     * 首页右侧的welcome欢迎iframe部分
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome()
    {
        return view('admin/index/welcome');
    }
}



















