<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livecourse extends Model
{
    protected $table = "live_course"; //表名
    protected $primaryKey = "id"; //主键名字
    protected $fillable = [
        'name', 'stream_id', 'cover_img',
        'start_at', 'end_at', 'desc'
    ];//数据添加、修改时允许维护的字段
    public function stream()
    {
        return $this->hasOne('\App\Http\Models\Stream', 'stream_id', 'stream_id');
    }
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
