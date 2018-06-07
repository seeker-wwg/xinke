<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $table = "student"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = [
        'id','stuId','name','sex','age',
        'nation','numId','csny','zm_id','xl_id','bj_id','tel','address','fqname','fqgzdw',
        'mqname','mqgzdw','jztel','kndj','prize','penalty','created_at','updated_at','deleted_at'
    ];//数据添加、修改时允许维护的字段
    public function banji()
    {
        return $this->hasOne('\App\Http\Models\Banji', 'bj_id', 'bj_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zzmm()
    {
        return $this->hasOne('\App\Http\Models\Zzmm', 'zm_id', 'zm_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function xueli()
    {
        return $this->hasOne('\App\Http\Models\Xueli', 'xl_id', 'xl_id');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
