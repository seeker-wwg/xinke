<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/home/img/asset-favicon.ico">
    <title>信科教务网</title>
    <link rel="stylesheet" href="/home/plugins/normalize-css/normalize.css" />
    <link rel="stylesheet" href="/home/plugins/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="/home/css/page-learing-sign.css" />
</head>

<body>
<!-- 页面 -->
<div class="register">
    <div class="register-head">
        <div class="wrap">
            <a href="javascript:;" class="logo">
                <img src="/home/img/asset-logoico.png" alt="logo" width="200">
            </a>
            <div class="go-regist" style="position: absolute;border-bottom: 10px;">还没有账号？<a href="javascript:void(0);">请前往教务科申请</a></div>
        </div>
    </div>
    <div class="register-body">
        <div class="register-cent">
            <img src="/home/img/asset-login_img.jpg" alt="" class="register-ico">
            <form class="required-validate" id="regStudentForm"
                  method="post" action="{{url('home/user/login')}}">
                {{csrf_field()}}
                <ul class="r-position login">
                    <li>
                        <div class="page-header">
                            <h3>欢迎登录信科教务网</h3>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">登录名：</label>
                            <div class="">
                                <input type="text" class="form-control" name="std_name"
                                       value="{{old('std_name')}}"
                                       placeholder="请输入登录名">
                                <span class="verif-span">请输入5-25个字符</span>
                                <span style="color:red;">{{$errors->first('std_name')}}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="control-label">密码</label>
                            <div class="">
                                <input type="password" class="form-control" name="password"
                                       value="{{old('password')}}"
                                       placeholder="请输入密码">
                                <span class="verif-span">请输入6-16个字符</span>
                                <span style="color:red;">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div style="color:red;">{{$errors->first('errorinfo')}}</div>
                    </li>
                    <li class="">
                        <button name="login" type="submit" class="btn btn-primary">登录</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<!-- 页面 css js -->
<script type="text/javascript" src="/home/plugins/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="/home/plugins/bootstrap/dist/js/bootstrap.js"></script>
<script src="../js/page-learing-sign.js"></script>
</body>