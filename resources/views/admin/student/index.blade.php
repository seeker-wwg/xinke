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
<title>学生管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 学生中心 <span class="c-gray en">&gt;</span> 学生管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">


            <select class="select" style="width: 30%;height: 30px" name="bj_id" id="bj_id">
                <option value="0">请选择班级</option>
                @foreach($banji as $k => $v)
                    <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>

            <select class="select"  style="width: 30%;height: 30px" name="zm_id" id="zm_id">
                <option value="0">请选择政治面貌</option>
                @foreach($zzmm as $k => $v)
                    <option value="{{$k}}">{{$v}}</option>
                @endforeach
            </select>



		<button type="submit" class="btn btn-success radius" id="searchXH" name=""><i class="Hui-iconfont">&#xe665;</i> 搜学生</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="deleteAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>

			<a href="javascript:;" onclick="member_add('添加学生','{{url("admin/student/tianjia")}}','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加学生</a>

				<a href="javascript:;" onclick="reset()" class="	btn btn-secondary-outline radius"><i class="Hui-iconfont">&#xe6f7;</i> 重置条件</a>
		</span>

		<span class="r">共有数据：<strong>{{$cnt}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
		<tr class="text-c">
				<th width="6%"><input type="checkbox" name="id" value=""></th>
				<th width="6%">ID</th>
				<th width="10%">学号</th>
				<th width="10%">姓名</th>
				<th width="5%">性别</th>
				<th width="10%">民族</th>
				<th width="10%">班级</th>
				<th width="15%">联系电话</th>
				<th width="15%">家庭住址</th>
				<th width="*">操作</th>
			</tr>
		</thead>

	<!--	<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>
				<td>男</td>
				<td>13000000000</td>
				<td>admin@mail.com</td>
				<td class="text-l">北京市 海淀区</td>
				<td>2014-6-11 11:11:42</td>
				<td class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		</tbody> -->
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
{{--<script type="text/javascript" src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>--}}
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
    mydatatable = $('.table-sort').dataTable({
        "lengthMenu": [ 8, 16, 32, 64 ],
        "paging":true,
        "search": {
            "regex": true
        },
        "info":true,
        "searching":true,
        "ordering":true,
        "order": [[ 1, "desc" ]],
        "columnDefs": [{
            "targets": [0,6,7,8,9],
            "orderable": false
        }],
        "processing":true,
        "serverSide": true,
        "ajax": {
            "url": "{{url('admin/student/index')}}",
            "type": "POST",
            "data":function(d){
                d.bj_id=$("#bj_id").val();
                d.zm_id=$("#zm_id").val();
            },
            'headers': {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
			},
        },
        "columns": [
            {"defaultContent": ""},
            {'data':'id'},
            {'data':'stuId'},
            {'data':'name'},
            {'data':'sex'},
            {'data':'nation'},
            {'data':'banji.bj_name'},
            {'data':'tel'},
            {'data':'address'},
            {"defaultContent": "","className":"td-manager"},
        ],

        "createdRow":function(row,data,dataIndex){
            //数据填充的回调函数，每个"tr"被绘制的时候会调用该函数
			//row:被绘制的tr的dom对象
			//data:该tr行对应的一条数据记录信息
			//dataIndex:是该tr的下表索引号码
			var fuxuank='<input type=\'checkbox\' name=\'stu_id\' value='+data.id+' >';
			$(row).find('td:eq(0)').html(fuxuank);
			var anniu = '<a title="编辑" href="javascript:;" onclick="member_edit(\'编辑\',\'/admin/student/xiugai/'+data.id+'\',4,\'\',510)" ' +
				'class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><a title="删除" href="javascript:;" onclick="member_del(this,'+data.id+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>';
			//把anniu填充给最后一个td里边
			$(row).find('td:eq(9)').html(anniu);
			//给每个tr设置一个class属性
			$(row).addClass('text-c');
		}
    });



    // $(document).on("click","#searchXH",function(){
    //     //自己定义的搜索框，可以是时间控件，或者checkbox 等等
    //
    //     var args1 = $("#bj_id").val();
    //     var args2 = $("#zm_id").val();
    //     //用空格隔开，达到多条件搜索的效果，相当于两个关键字
    //     console.log(args1+" "+args2);
    //     // mydatatable.api().search(args1).draw();
    //     //table.search(args1+" "+args2).draw(false);//保留分页，排序状态
    //
    // });
	//多条件搜索
    $(document).delegate('#searchXH','click',function() {
        mydatatable.api().ajax.reload();

    });
	
});

//重置搜索条件
function reset() {
    $("#bj_id").val("");
    $("#zm_id").val("");
}
//批量删除
function deleteAll() {
    console.dir( $("input[name=stu_id]:checked").parents("tr"));
    var theArray=[];
    $("input[name=stu_id]:checked").each(function() {
        theArray.push($(this).val());
    });


    if(theArray.length<1){
        layer.confirm('至少要选择一个？');
    }else{

        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/admin/student/delAll',
                dataType: 'json',
				data:{delAll:theArray},
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}',
                },
                success: function(data){
                    $("input[name=stu_id]:checked").parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                    mydatatable.api().ajax.reload();
                },
                error:function(data) {
                    console.log(data.msg);
                    // layer.msg('已删除!',{icon:1,time:1000});
                },
            });
        });
    }
}

/*学生-播放视频*/
// function show_video(lesson_id){
//     layer_show('播放视频','/admin/lesson/video_play/'+lesson_id,800,500);
// }
/*学生-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*学生-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*学生-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*学生-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*学生-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*学生-删除*/
function member_del(obj,id){
    // console.dir($(obj).parents("tr"));
	layer.confirm('确认要删除吗？',function(index){

		$.ajax({
			type: 'GET',
			url: '/admin/student/del/'+id,
			dataType: 'json',
			headers:{
			    'X-CSRF-TOKEN':'{{csrf_token()}}',
			},
			success: function(data){

				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
				mydatatable.api().ajax.reload();
			},
			error:function(data) {
				console.log(data.msg);
                // layer.msg('已删除!',{icon:1,time:1000});
			},
		});		
	});
}
</script> 
</body>
</html>