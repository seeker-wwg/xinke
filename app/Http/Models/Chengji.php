<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chengji extends Model
{
    protected $table = "chengji"; //表名
    protected $primaryKey = "cj_id"; //主键名字
    protected $fillable = [
        'cj_id','kcxq_id','bj_id','stuId','name',
        'kcnum','kcname','kcpt_id','kclb_id','xuefen','score','beizhu','bkscore','zxscore', 'created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
    public function banji()
    {
        return $this->hasOne('\App\Http\Models\Banji', 'bj_id', 'bj_id');
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


    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
