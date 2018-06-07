<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Zhicheng extends Model
{
    protected $table = "zhicheng"; //表名
    protected $primaryKey = "zc_id"; //主键名字
    protected $fillable = [
        'zc_name', 'created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
}
