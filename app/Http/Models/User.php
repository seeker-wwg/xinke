<?php

namespace App\Http\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    protected $table = "user"; //表名
    protected $primaryKey = "std_id"; //主键名字
    protected $fillable = [
        'std_name','password','id','std_pic'
    ];//数据添加、修改时允许维护的字段
    //设置软删除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
