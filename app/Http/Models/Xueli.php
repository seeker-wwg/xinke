<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Xueli extends Model
{
    protected $table = "xueli"; //表名
    protected $primaryKey = "xl_id"; //主键名字
    protected $fillable = [
        'xl_id', 'xl_name','created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
}
