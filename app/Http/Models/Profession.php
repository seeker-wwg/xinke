<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = "profession"; //表名
    protected $primaryKey = "pro_id"; //主键名字
    protected $fillable = [
        'pro_name', 'teacher_ids', 'pro_desc',
        'cover_img', 'carousel_imgs',
    ];//数据添加、修改时允许维护的字段
}
