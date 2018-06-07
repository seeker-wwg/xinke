<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "course"; //表名
    protected $primaryKey = "course_id"; //主键名字
    protected $fillable = [
        'course_name', 'pro_id', 'course_price',
        'course_desc'
    ];//数据添加、修改时允许维护的字段
    public function profession()
    {
        return $this->hasOne('\App\Http\Models\Profession', 'pro_id', 'pro_id');
    }
}
