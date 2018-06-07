<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Jiaoxuefx extends Model
{
    protected $table = "jiaoxuefx"; //表名
    protected $primaryKey = "jxfx_id"; //主键名字
    protected $fillable = [
        'jxfx_id', 'jxfx_name','created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
//    public function profession()
//    {
//        return $this->hasOne('\App\Http\Models\Profession', 'pro_id', 'pro_id');
//    }
}
