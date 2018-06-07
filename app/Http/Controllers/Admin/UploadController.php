<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * 附件上传处理--上传课时视频
     * @param Request $request
     */
    public function up_video(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {
            //附件上传
            //$file->store(附件存储的二级目录,磁盘驱动);
            $rst = $file->store('video', 'public');
            //echo $rst;// video/87dvr2nPyJZgcwIALQzlXAvDJc3CisHGgYOkdObO.mp4
            //echo "/storage/".$rst;// /storage/video/87dvr2nPyJZgcwIALQzlXAvDJc3CisHGgYOkdObO.mp4
            echo json_encode(['success' => true, 'filename' => "/storage/" . $rst]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;
    }

    /**
     * 附件上传处理--上传课时封面图
     * @param Request $request
     */
    public function up_pic(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {
            //附件上传
            //$file->store(附件存储的二级目录,磁盘驱动);
            $rst = $file->store('lesson', 'public');
            //echo $rst;// video/87dvr2nPyJZgcwIALQzlXAvDJc3CisHGgYOkdObO.png
            //echo "/storage/".$rst;// /storage/video/87dvr2nPyJZgcwIALQzlXAvDJc3CisHGgYOkdObO.png
            echo json_encode(['success' => true, 'filename' => "/storage/" . $rst]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;
    }
}
