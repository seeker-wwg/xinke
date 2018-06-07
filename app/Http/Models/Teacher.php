<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teacher"; //表名
    protected $primaryKey = "tc_id"; //主键名字
    protected $fillable = [
        'tc_name', 'sex','xl_id','zc_id','created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
}
