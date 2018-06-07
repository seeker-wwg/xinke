<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<!--/meta 作为公共模版分离出去-->

<title>修改课时 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">


		{{csrf_field()}}


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>专业代码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="zy_id">
					<option value="0">请选择专业代码</option>
					@foreach($zhuanyedm as $k => $v)
						<option value="{{$k}}"
								@if($yypyfangan->zy_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>教学方向：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="jxfx_id">
					<option value="0">请选择教学方向</option>
					@foreach($jiaoxuefx as $k => $v)
						<option value="{{$k}}"
								@if($yypyfangan->jxfx_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程性质：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="kcpt_id">
					<option value="0">请选择课程性质</option>
					@foreach($kechengpt as $k => $v)
						<option value="{{$k}}"
								@if($yypyfangan->kcpt_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>




		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程类别：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="kclb_id">
					<option value="0">请选择课程类别</option>
					@foreach($kechenglb as $k => $v)
						<option value="{{$k}}"
								@if($yypyfangan->kclb_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>开课学期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="kcxq_id">
					<option value="0">请选择开课学期</option>
					@foreach($kechengxq as $k => $v)
						<option value="{{$k}}"
								@if($yypyfangan->kcxq_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程编号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->kcnum}}" placeholder="" id="kcnum" name="kcnum">
			</div>
		</div>





		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->kcname}}" placeholder="" id="kcname" name="kcname">
			</div>
		</div>







		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>考核方式：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->khfs}}" placeholder="" id="khfs" name="khfs" >
			</div>
		</div>




		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学分：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->xuefen}}" placeholder="" id="xuefen" name="xuefen">
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>总课时：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->zkeshi}}" placeholder="" id="zkeshi" name="zkeshi">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>理论课时：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->lilun}}" placeholder="" id="lilun" name="lilun">
			</div>
		</div>






		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>实验课时：</label>
			<div class="formControls col-xs-8 col-sm-9" >
				<input type="text" class="input-text" value="{{$yypyfangan->shiyan}}" placeholder="" id="shiyan" name="shiyan">
			</div>
		</div>





		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>实践课时：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->shijian}}" placeholder="" id="shijian" name="shijian">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>周学时：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$yypyfangan->zhouxueshi}}" placeholder="" id="zhouxueshi" name="zhouxueshi">
			</div>
		</div>


		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});

	$("#form-member-add").submit(function(evt){
		evt.preventDefault();
		var shuju = $(this).serialize();
		// console.log(shuju);
		
		$.ajax({
			url:'{{url("admin/peiyang/xiugai",["yypyfangan"=>$yypyfangan->id])}}',
			data:shuju,
			dataType:'json',
			type:'post',
			success:function(msg){
				if(msg.success===true){
				    //alert('修改数据成功');
				    //做提示
					layer.alert('修改数据成功',function(){
                        //①“课时列表”页刷新显示新修改的课时
                        //使得父页面的datatable的ajax重新获取数据显示
						parent.mydatatable.api().ajax.reload();

						layer_close();//②关闭当前层
					});
				}else{
				    layer.alert('修改数据失败【'+msg.errorinfo+'】',{icon:5});
				}
			}
		});

	});





	
	// $("#form-member-add").validate({
		// rules:{
		// 	username:{
		// 		required:true,
		// 		minlength:2,
		// 		maxlength:16
		// 	},
		// 	sex:{
		// 		required:true,
		// 	},
		// 	mobile:{
		// 		required:true,
		// 		isMobile:true,
		// 	},
		// 	email:{
		// 		required:true,
		// 		email:true,
		// 	},
		// 	uploadfile:{
		// 		required:true,
		// 	},
			
		// },
		// onkeyup:false,
		// focusCleanup:true,
		// success:"valid",
	// 	submitHandler:function(form){
	// 		//$(form).ajaxSubmit();
	// 		var index = parent.layer.getFrameIndex(window.name);
	// 		//parent.$('.btn-refresh').click();
	// 		parent.layer.close(index);
	// 	}
	// });
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>