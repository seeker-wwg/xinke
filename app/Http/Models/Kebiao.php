<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Kebiao extends Model
{
    protected $table = "kebiao"; //表名
    protected $primaryKey = "kb_id"; //主键名字
    protected $fillable = [
        'bj_id', 'tc_id', 'kb_day',
        'kb_section', 'kb_didian',
        'course_id', 'kb_kaohe',
    ];//数据添加、修改时允许维护的字段

    public function banji()
    {
        return $this -> hasOne('App\Http\Models\Banji','bj_id','bj_id');
    }

    public function teacher()
    {
        return $this -> hasOne('App\Http\Models\Teacher','tc_id','tc_id');
    }
    public function course()
    {
        return $this -> hasOne('App\Http\Models\Course','course_id','course_id');
    }
}
