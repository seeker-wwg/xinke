<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = "stream"; //表名
    protected $primaryKey = "stream_id"; //主键名字
    protected $fillable = [
        'stream_id', 'stream_name', 'created_at',
        'created_at', 'deleted_at'
    ];//数据添加、修改时允许维护的字段

    // use SoftDeletes;
    // protected $dates = ['deleted_at'];
}
