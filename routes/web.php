<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'Home\IndexController@index');
//----------------------------------------------------------------------------------
//【前台路由群组】
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){
    //网站服务
    Route::match(['get','post'],'server','ServerController@kebiao');
    //学员--登录系统
    Route::match(['get','post'],'user/login','UserController@login');
    Route::get('user/logout','UserController@logout');

    //前台个人中心--课程列表展示(购买的、直播的)
    Route::get('person/course','PersonController@course');

    //前台个人中心--播放直播课程
    Route::get('livecourse/play/{stream}','LivecourseController@play');

});
//-------------------------------------------------------------------------------------
//【后台路由群组】
//prefix:路由前缀
//namespace:控制器命名空间
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('test','TestController@test');
        //后台管理员--登录系统[get/post]
        //通过name()方法给当前路由设置名称
        Route::match(['get','post'],'manager/login','ManagerController@login')->name('login');
        //后台管理员--退出系统
        Route::get('manager/logout','ManagerController@logout');

    //设置auth中间件并有back的guard设置
    Route::group(['middleware'=>'auth:back'],function(){
        //后台index
        Route::get('index/index', 'IndexController@index');
        Route::get('index/welcome', 'IndexController@welcome');
        //禁止翻墙 的视图
        Route::get('err/index', 'ErrController@index');
        //与业务有紧密关系的路由要求有fanqiang中间件设置
        Route::group(['middleware'=>'fanqiang'],function(){


            //学生列表显示----------------------------------------------------------
            Route::match(['get', 'post'], 'student/index', 'StudentController@index');
            //列表添加
            Route::match(['get', 'post'], 'student/tianjia', 'StudentController@tianjia');

            //后台学生管理--修改
            Route::match(['get', 'post'], 'student/xiugai/{student}', 'StudentController@xiugai');
            //后台学生管理--删除
            Route::get('student/del/{student}', 'StudentController@del');
            Route::match(['get', 'post'], 'student/delAll', 'StudentController@delAll');
            //---------------------------------------------------------------------------------



            //培养计划列表显示----------------------------------------------------------
            Route::match(['get', 'post'], 'peiyang/index', 'PeiyangController@index');
            //列表添加
            Route::match(['get', 'post'], 'peiyang/tianjia', 'PeiyangController@tianjia');

            //后台培养计划管理--修改
            Route::match(['get', 'post'], 'peiyang/xiugai/{yypyfangan}', 'PeiyangController@xiugai');
            //后台培养计划管理--删除
            Route::get('peiyang/del/{yypyfangan}', 'PeiyangController@del');
            Route::match(['get', 'post'], 'peiyang/delAll', 'PeiyangController@delAll');




            //成绩列表显示----------------------------------------------------------
            Route::match(['get', 'post'], 'chengji/index', 'ChengjiController@index');
            //列表添加
            Route::match(['get', 'post'], 'chengji/tianjia', 'ChengjiController@tianjia');

            //成绩培养计划管理--修改
            Route::match(['get', 'post'], 'chengji/xiugai/{chengji}', 'ChengjiController@xiugai');
            //成绩培养计划管理--删除
            Route::get('chengji/del/{chengji}', 'ChengjiController@del');
            Route::match(['get', 'post'], 'chengji/delAll', 'ChengjiController@delAll');
            //导出excel
            Route::match(['get', 'post'], 'chengji/daoChu', 'ChengjiController@daoChu');


            //excel导入导出
            Route::get('excel/export','ExcelController@export');
            Route::get('excel/import','ExcelController@import');




            //后台角色维护--列表展示-------------------------------------------------------
            Route::get('role/index','RoleController@index');
            //后台角色维护--修改(分配权限)
            Route::match(['get','post'],'role/xiugai/{role}','RoleController@xiugai');




            //-------------------------------------------------
            //后台权限维护--列表展示
            Route::get('permission/index','PermissionController@index');
            //后台权限维护--添加
            Route::match(['get','post'],'permission/tianjia','PermissionController@tianjia');


            //后台管理员--列表显示-----------------------------------------
            Route::get('manager/index','ManagerController@index');


            //后台课程表-------------------------------------------------
            Route::get('kebiao/index','KebiaoController@index');

        });
    });
});

//直播流管理
Route::get('admin/stream/index', 'Admin\StreamController@index');
Route::match(['get', 'post'], 'admin/stream/tianjia', 'Admin\StreamController@tianjia');
//直播课程管理
Route::get('admin/livecourse/index', 'Admin\LivecourseController@index');
Route::match(['get', 'post'], 'admin/livecourse/tianjia', 'Admin\LivecourseController@tianjia');
//后台直播课程管理--获取"推流地址"
Route::get('admin/livecourse/getpush/{livecourse}/{stream}', 'Admin\LivecourseController@getpush');
//后台上传附件--上传视频-------------------------------
Route::post('admin/upload/up_video', 'Admin\UploadController@up_video');

//后台上传附件--给学生上传封面图
Route::post('admin/upload/up_pic', 'Admin\UploadController@up_pic');

//后台上传附件--视频播放
Route::get('admin/lesson/video_play/{lesson}', 'Admin\LessonController@video_play');



//----------------------------------------------------
