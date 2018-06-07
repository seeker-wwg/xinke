<?php

namespace App\Http\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

//因为当前的模型需要用于校验账号和密码，因此要继承Authenticatable
//这个Authenticatable有去继承Model，因此数据库的元素一个都不少
class Manager extends Authenticatable
{
    protected $table = "manager"; //表名
    protected $primaryKey = "mg_id"; //主键名字
    protected $fillable = ['mg_name','password','role_id',
        'mg_sex','mg_remark'];//数据添加、修改时允许维护的字段

    //设置软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * 建立与Role模型的关系
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this -> hasOne('App\Http\Models\Role','role_id','role_id');
    }
}
