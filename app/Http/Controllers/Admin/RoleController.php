<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Permission;
use App\Http\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * 角色列表展示
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $info = Role::paginate(6);  //获得全部的角色信息
        return view('admin/role/index',compact('info'));
    }

    /**
     * 修改角色(分配权限)
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function xiugai(Request $request, Role $role)
    {
        if($request->isMethod('post')){
            #收集信息存储
            //只负责给角色"分配权限"
            //① 权限ids制作ok
            $ps_ids = implode(',',$request->input('quanxian'));          //Array--->String

            //② 权限对应的"控制器-操作方法"信息(根据$ps_ids获取)
            $ps_ca = Permission::whereIn('ps_id',$request->input('quanxian'))
                ->select(\DB::raw("concat(ps_c,'-',ps_a) as ca"))
                ->whereIn('ps_level',['1','2'])
                ->pluck('ca');
            //select concat(ps_c,'-',ps_a) as ca from `edu_permission` where `ps_id` in ('101', '104', '112', '105', '106') and `ps_level` in ('1', '2') and `edu_permission`.`deleted_at` is null
            //dd($ps_ca);   //collect(array(c-a,c-a,c-a..))
            //Collection {array:4 [0 => "Stream-index"1 => "Livecourse-index" 2 => "Lesson-index" 3 => "Stream-tianjia" ]}

            //把$ps_ca的数组给提取出来 并转变为",逗号" 连接的字符串
            $ps_ca = implode(',',$ps_ca->toArray()); //"Stream-index,Livecourse-index,Lesson-index,Stream-tianjia"

            //把① 和 ② 维护好的两个信息更新给角色
            $rst = $role->update([
                'ps_ids' => $ps_ids,
                'ps_ca'  => $ps_ca,
            ]);
            return ['success'=>true];
        }

        #展示修改表单页
        //把给角色分配的1、2、3级别权限获得出来并提供给模板展示
        $permission_A = Permission::where('ps_level','0')->get();
        $permission_B = Permission::where('ps_level','1')->get();
        $permission_C = Permission::where('ps_level','2')->get();
        return view('admin/role/xiugai',compact('role','permission_A','permission_B','permission_C'));
    }
}