<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Zzmm extends Model
{
    protected $table = "zzmm"; //表名
    protected $primaryKey = "zm_id"; //主键名字
    protected $fillable = [
        'zm_id', 'zm_name','created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
}
