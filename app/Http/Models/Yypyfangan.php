<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Yypyfangan extends Model
{
    protected $table = "yypyfangan"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = [
        'id','zy_id','jxfx_id','kcpt_id','kclb_id',
        'kcxq_id','kcnum','kcname','khfs','xuefen','zkeshi','lilun','shiyan','shijian','zhouxueshi', 'created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
    public function jiaoxuefx()
    {
        return $this->hasOne('\App\Http\Models\Jiaoxuefx', 'jxfx_id', 'jxfx_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kechenglb()
    {
        return $this->hasOne('\App\Http\Models\Kechenglb', 'kclb_id', 'kclb_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kechengpt()
    {
        return $this->hasOne('\App\Http\Models\Kechengpt', 'kcpt_id', 'kcpt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kechengxq()
    {
        return $this->hasOne('\App\Http\Models\Kechengxq', 'kcxq_id', 'kcxq_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zhuanyedm()
    {
        return $this->hasOne('\App\Http\Models\Zhuanyedm', 'zy_id', 'zy_id');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
