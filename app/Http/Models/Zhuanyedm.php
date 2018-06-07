<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Zhuanyedm extends Model
{
    protected $table = "zhuanyedm"; //表名
    protected $primaryKey = "zy_id"; //主键名字
    protected $fillable = [
        'zy_id', 'zy_name','zy_daima','created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
//    public function profession()
//    {
//        return $this->hasOne('\App\Http\Models\Profession', 'pro_id', 'pro_id');
//    }
}
