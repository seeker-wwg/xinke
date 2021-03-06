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

<title>修改成绩 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">


		{{csrf_field()}}

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="kcxq_id">
					<option value="0">请选择学期</option>
					@foreach($kechengxq as $k => $v)
						<option value="{{$k}}"
								@if($chengji->kcxq_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>班级：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="bj_id">
					<option value="0">请选择班级</option>
					@foreach($banji as $k => $v)
						<option value="{{$k}}"
								@if($chengji->bj_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>






		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->stuId}}" placeholder="" id="stuId" name="stuId">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->name}}" placeholder="" id="name" name="name">
			</div>
		</div>




		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程编号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->kcnum}}" placeholder="" id="kcnum" name="kcnum">
			</div>
		</div>





		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->kcname}}" placeholder="" id="kcname" name="kcname">
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程性质：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select class="select" size="1" name="kcpt_id">
					<option value="0">请选择课程性质</option>
					@foreach($kechengpt as $k => $v)
						<option value="{{$k}}"
								@if($chengji->kcpt_id == $k)
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
								@if($chengji->kclb_id == $k)
								selected="selected"
								@endif
						>{{$v}}</option>
					@endforeach
				</select>
			</div>
		</div>



		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学分：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->xuefen}}" placeholder="" id="xuefen" name="xuefen">
			</div>
		</div>






		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分数：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->score}}" placeholder="" id="score" name="score">
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->beizhu}}" placeholder="" id="beizhu" name="beizhu" >
			</div>
		</div>








		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">补考分数：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->bkscore}}" placeholder="" id="bkscore" name="bkscore">
			</div>
		</div>




		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">重修分数：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$chengji->zxscore}}" placeholder="" id="zxscore" name="zxscore">
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
			url:'{{url("admin/chengji/xiugai",["chengji"=>$chengji->cj_id])}}',
			data:shuju,
			dataType:'json',
			type:'post',
			success:function(msg){
				if(msg.success===true){
				    //alert('修改数据成功');
				    //做提示
					layer.alert('修改数据成功',function(){
                        //①“成绩列表”页刷新显示新修改的成绩
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