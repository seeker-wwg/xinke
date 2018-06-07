<?php

namespace App\Http\Middleware;

use App\Http\Models\Manager;
use Closure;

class Fanqiang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获得用户的会话id信息
        $mg_id = \Auth::guard('back')->user()->mg_id;

        //root超级管理员无需翻墙访问限制
        if($mg_id!=1){
            //(普通用户)翻墙访问限制
            //① 获取用户的角色，根据角色 获取该用户可以访问的权限"控制器-操作方法"列表
            $ps_ca = Manager::find($mg_id)->role->ps_ca;

            //② 获取当前访问的"控制器-操作方法"
            $nowCA = getCurrentControllerName()."-".getCurrentMethodName();

            //③ 判断：当前访问“控制器-操作方法” 是否在角色拥有的权限"控制器-操作方法"列表中里边出现
            //     出现：合法访问，未出现：非法访问
            if(strpos($ps_ca,$nowCA)===false){
//                exit('没有权限访问！');
                return redirect('admin/err/index');
            }
        }
        return $next($request);
    }
}
