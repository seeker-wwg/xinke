﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用西藏大学 信科院后台管理系统 <span class="f-14">v1.0</span></p>

	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>学生库</th>
				<th>教师库</th>
				<th>角色库</th>
				<th>用户</th>
				<th>管理员</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>总数</td>
				<td>92</td>
				<td>9</td>
				<td>0</td>
				<td>8</td>
				<td>20</td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td>2</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName">{{$_SERVER['SERVER_NAME']}}</span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td>{{$_SERVER['SERVER_ADDR']}}</td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td>{{$_SERVER["SERVER_NAME"]}}</td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>{{$_SERVER['REMOTE_PORT']}}</td>
			</tr>
			<tr>
				<td>服务器IIS版本 </td>
				<td>{{php_uname('r')}}</td>
			</tr>
			<tr>
				<td>本文件所在文件夹 </td>
				<td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
			</tr>
			<tr>
				<td>服务器操作系统 </td>
				<td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
			</tr>
			<tr>
				<td>系统所在文件夹 </td>
				<td>{{$_SERVER['SystemRoot']}}</td>
			</tr>
			<tr>
				<td>服务器类型 </td>
				<td>{{php_uname()}}</td>
			</tr>
			<tr>
				<td>服务器的语言种类 </td>
				<td>Chinese (People's Republic of China)</td>
			</tr>
			<tr>
				<td>服务器当前时间 </td>
				<td>{{date('Y-m-d h:i:s', time())}}</td>
			</tr>
			<tr>
				<td>服务器IE版本 </td>
				<td>6.0000</td>
			</tr>


			<tr>
				<td>当前系统用户名 </td>
				<td>{{Auth::guard('back')->user()->mg_name}}</td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>
			本后台系统由<a href="/" target="_blank" title="西藏大学 信科院">西藏大学 信息科学与技术学院</a>提供技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>