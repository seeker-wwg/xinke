<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="维修,电脑,装软件">
    <title>西藏大学信息技术与科学</title>
    <link href="/home/csss/jquery.fancybox-1.3.4.css" rel="stylesheet">
    <link href="/home/csss/jquery.hiSlider.min.css" rel="stylesheet">
    <link type="text/css"  rel="stylesheet" href="/home/csss/hwslider.css" />
    <link href="/home/csss/font.css" rel="stylesheet">
    <link href="/home/csss/reset.css" rel="stylesheet">
    <link href="/home/csss/style.css" rel="stylesheet">
    <link href="/home/csss/xiang.css" rel="stylesheet">
    <script src="/home/jss/jquery-1.11.3.min.js"></script>
    <script src="/home/jss/jquery.hwslider.min.js"></script>
    <script src="/home/jss/modernizr.custom.53451.js"></script>
    <script src="/home/jss/jquery.hiSlider.min.js"></script>
    <script src="/home/jss/jquery.gallery.js"></script>
    <script src="/home/jss/art.js"></script>
    <style>
        .clearfix{
            overflow: hidden;
        }

    </style>
</head>
<body>
<header>
    <div class="top_t clearfix">
        <div class="cont">
            @if(Auth::guard('front')->check())
                <P class="left">欢迎你 <font size="16" color="red">{{Auth::guard('front')->user()->std_name}}</font> 同学西藏大学信息技术与科学，助你圆梦!</P>
            <ul class="pin right">
                <li><a href="index.html">中文版</a></li>|
                <li><a href="e-index.html">English</a></li>
            </ul>
            @else
                <P class="left">西藏大学信息技术与科学，助你圆梦!</P>
                <ul class="pin right">
                    <li><a href="index.html">中文版</a></li>|
                    <li><a href="e-index.html">English</a></li>
                    <li><a href="{{url('home/user/login')}}">登录</a></li>
                </ul>
            @endif
        </div>
    </div>
    <div class="top_b">
        <div class="cont clearfix pc">
            <a class="left" href="index.html"><img src="/home/images/logoz.png"></a>
            <nav>
                <ul class="pin right">
                    <li><a href="/">首页</a></li>
                    <li><a href="about.html">学院</a></li>
                    <li><a href="study.html">研究</a></li>
                    <li><a href="teacher.html">师资</a></li>
                    <li><a href="train.html">学科建设</a></li>
                    <li><a href="build.html">基地</a></li>
                    <li><a href="new.html">动态</a></li>
                    @if(Auth::guard('front')->check())
                    <li><a href="{{url('home/server')}}">服务</a></li>
                        @endif
                </ul>
            </nav>
        </div>
        <div class=" phone">
            <a class="logo" href="javascript:void(0);"><img src="/home/images/logoz.png"></a>
            <a class="icon-align-justify" href="javasrcipt:"></a>
            <nav>
                <ul>
                    <li><a href="index.html">首页</a></li>
                    <li><a href="about.html">学院</a></li>
                    <li><a href="study.html">研究</a></li>
                    <li><a href="teacher.html">师资</a></li>
                    <li><a href="train.html">学科建设</a></li>
                    <li><a href="build.html">基地</a></li>
                    <li><a href="new.html">动态</a></li>
                    <li><a href="{{url('home/server')}}">服务</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

@yield('content')

<!--底部版权-->

<div class="foot">
    <div class="cont clearfix">
        <img class="left" src="/home/images/bottom_logo.png">
        <div class="right">
            <p>Copyright © 2018西藏大学信息技术与科学 陕ICP备18005320号</p>
            <p>地址：西藏拉萨市藏大东路10号 邮编：850000</p>
            <p>技术支持：<a target="black" href="http://www.utibet.edu.cn/">西藏大学信科院</a></p>
        </div>
    </div>
</div>
<script>
    $('.hiSlider').hiSlider({
        isFlexible: true,
        isSupportTouch: true,
    });
    $(function() {
        $("#hwslider").hwSlider({
            height: 190,
            autoPlay: true,
            arrShow: true,
            dotShow: true,
            touch: true
        });
    });
</script>
</body>
</html>