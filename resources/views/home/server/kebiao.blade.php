@extends('/home/buju/layout')
@section('content')
    <!--css引入-->
    <link href="/home/style/common.css" rel="stylesheet" type="text/css">
    <link href="/home/style/style.css" rel="stylesheet" type="text/css">
    <link href="/home/csss/cj.css" rel="stylesheet" type="text/css">
    <!--js引入-->
    <script src="/demos/googlegg.js"></script>
<div class="big-warp" style="background-color:#e6e6e6 ;">
    <script type="text/javascript" src="/home/js/tab.js"></script>

    <div class="n_banner warp"><img src="/home/images/ban1.jpg" alt /></div>
    <div class="n_place_warp warp">
        <div class="n_place">
            <ul class="clr">
                <li class="first"></li>
                <li><a href="javascript:void(0);">首页&nbsp;&nbsp;&nbsp;></a></li>
                <li><a href="javascript:void(0);">学生服务&nbsp;&nbsp;&nbsp;></a></li>
                <li><a href="">课表查询</a></li>
                <li class="last"></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="warp clearfix">
        <div class="n_main clr">
            <div class="n_left">
                <div class="n_nleft">
                    <h3>学生服务</h3>
                    <ul>
                        <li class="tab-nav"><a href="javascript:void(0)" class="cur">课表查询</a></li>
                        <li class="tab-nav"><a href="javascript:void(0)">成绩查询</a></li>
                        <li class="tab-nav"><a href="{{url('home/pingjiao/index')}}">学生评教</a></li>
                    </ul>
                </div>
            </div>
            <div class="n_rig tab-plane hide">
                <div class="nrig_tit2 clr">
                    <h3>课表查询</h3>
                </div>
                <div class="at_picdetail">
                    <!--    课表查询          -->
                    <h1 class="titleH1 underNone ">
                        <span class="left underNone underLine">14计师-2018年度上学期课程表</span>
                    </h1>
                    <div class="jyTable">
                        <div class="">
                            <ul class="title title1 left">
                                <li class='cur'>星期一</li>
                                <li>星期二</li>
                                <li>星期三</li>
                                <li>星期四</li>
                                <li>星期五</li>

                            </ul>
                        </div>
                        <div class='zong'>
                            <div class="list list1">
                                <div class="tabCon">
                                    <ul>
                                        <li class="tabth clearfix">
                                            <span style="width: 13%">时间/上午</span>
                                            <span style="width: 12%">考核方式</span>
                                            <span style="width: 10%">教室</span>
                                            <span style="width: 16%">班级</span>
                                            <span style="width: 16%">课程内容</span>
                                            <span style="width: 16%">教员/班主任</span>
                                            <span style="width: 15%">操作</span>
                                        </li>
                                        </li>
                                    </ul>
                                    <div id="s1">
                                        <ul class="tabUl">
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第一二节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">4-108、12-305</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">高级语言程序设计 II </span>
                                                <span style="width: 17%">曾晓莉</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第三四节</span>
                                                <span style="width: 12%;color: #AB9C08">考查</span>
                                                <span style="width: 10%;color: #067D14">4-108</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">概率与数理统计</span>
                                                <span style="width: 17%">邹莉</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>

                                <div class="tabCon">
                                    <ul>
                                        <li class="tabth clearfix">
                                            <span style="width: 13%">时间/上午</span>
                                            <span style="width: 12%">考核方式</span>
                                            <span style="width: 10%">教室</span>
                                            <span style="width: 16%">班级</span>
                                            <span style="width: 16%">课程内容</span>
                                            <span style="width: 16%">教员/班主任</span>
                                            <span style="width: 15%">操作</span>
                                        </li>
                                        </li>
                                    </ul>
                                    <div id="s2">
                                        <ul class="tabUl">
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第一二节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">10-203</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">大学英语IV</span>
                                                <span style="width: 17%">王喆单</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第三四节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">12-204</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">多媒体技术</span>
                                                <span style="width: 17%">曲珍</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>

                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第五六节</span>
                                                <span style="width: 12%;color: #AB9C08">考查</span>
                                                <span style="width: 10%;color: #067D14">12-202</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">计算机安装与维护</span>
                                                <span style="width: 17%">普次仁</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tabCon">
                                    <ul>
                                        <li class="tabth clearfix">
                                            <span style="width: 13%">时间/上午</span>
                                            <span style="width: 12%">校区</span>
                                            <span style="width: 10%">教室</span>
                                            <span style="width: 16%">班级</span>
                                            <span style="width: 16%">课程内容</span>
                                            <span style="width: 16%">教员/班主任</span>
                                            <span style="width: 15%">操作</span>
                                        </li>
                                        </li>
                                    </ul>
                                    <div id="s3">
                                        <ul class="tabUl">
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第一二节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">10-203</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">大学英语IV</span>
                                                <span style="width: 17%">王喆单</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第三四节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">12-204</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">多媒体技术</span>
                                                <span style="width: 17%">曲珍</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>

                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第五六节</span>
                                                <span style="width: 12%;color: #AB9C08">考查</span>
                                                <span style="width: 10%;color: #067D14">12-202</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">计算机安装与维护</span>
                                                <span style="width: 17%">普次仁</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="tabCon">
                                    <ul>
                                        <li class="tabth clearfix">
                                            <span style="width: 13%">时间/上午</span>
                                            <span style="width: 12%">校区</span>
                                            <span style="width: 10%">教室</span>
                                            <span style="width: 16%">班级</span>
                                            <span style="width: 16%">课程内容</span>
                                            <span style="width: 16%">教员/班主任</span>
                                            <span style="width: 15%">操作</span>
                                        </li>
                                        </li>
                                    </ul>
                                    <div id="s4">
                                        <ul class="tabUl">
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第一二节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">4-108</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">高级语言程序设计 II </span>
                                                <span style="width: 17%">曾晓莉</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第三四节</span>
                                                <span style="width: 12%;color: #AB9C08">考查</span>
                                                <span style="width: 10%;color: #067D14">4-108</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">概率与数理统计</span>
                                                <span style="width: 17%">邹莉</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>

                                <div class="tabCon">
                                    <ul>
                                        <li class="tabth clearfix">
                                            <span style="width: 13%">时间/上午</span>
                                            <span style="width: 12%">校区</span>
                                            <span style="width: 10%">教室</span>
                                            <span style="width: 16%">班级</span>
                                            <span style="width: 16%">课程内容</span>
                                            <span style="width: 16%">教员/班主任</span>
                                            <span style="width: 15%">操作</span>
                                        </li>
                                        </li>
                                    </ul>
                                    <div id="s5">
                                        <ul class="tabUl">
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第一二节</span>
                                                <span style="width: 12%;color: #AB9C08">考试</span>
                                                <span style="width: 10%;color: #067D14">4-108</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">高级语言程序设计 II </span>
                                                <span style="width: 17%">曾晓莉</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>
                                            <li class="tabtr clearfix">
                                                <span style="width: 13%; color: #F7001E">第三四节</span>
                                                <span style="width: 12%;color: #AB9C08">考查</span>
                                                <span style="width: 10%;color: #067D14">4-108</span>
                                                <span style="width: 15%">14计师</span>
                                                <span style="width: 17%">概率与数理统计</span>
                                                <span style="width: 17%">邹莉</span>
                                                <a style="width: 12%;color: #F7001E"><em class="clickbtn hot">查看</em></a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--成绩查询--}}
            <div class="n_rig tab-plane">
                <div class="nrig_tit2 clr">
                    {{--<h3 style="margin-bottom: 40px;">成绩查询</h3>--}}
                    <div style="width: 700px;height: 2px;
border: 1px solid #fe7596;"></div>
                    {{--<select  style="margin-top: 40px;width: 700px;" id="selDepart" onchange="window.location=this.value;">--}}
                        {{--<i class="am-selected-icon am-icon-caret-down"></i>--}}
                        {{--<option value="0">--}}
                            {{--请选择班级--}}
                        {{--</option>--}}


                        {{--<option value="{$smarty.const.__CONTROLLER__}/banji/id/1401">--}}
                            {{--14级计师--}}
                        {{--</option>--}}



                        {{--<option value="{$smarty.const.__CONTROLLER__}/banji/id/1402">--}}
                            {{--14级计本--}}
                        {{--</option>--}}


                    {{--</select>--}}
                    {{--</header>--}}
                    <div style="padding-top: 20px;">
                    <div class="main"  >
                        <div class="col-lg-3">
                            <h2>14计算机师范班</h2>
                            <p>{{Auth::guard('front')->user()->std_name}}</p>
                        </div>
                        <div class="col-lg-3">
                            <div class="circular">良</div>
                        </div>
                        <div class="col-lg-3">
                            <div class="col-lg-2">
                                <h2>总分</h2>
                                <p>700</p>
                            </div>

                        </div>
                    </div>
                    <ul class="list">
                        <li>
                            <a href="">
                                <i class="fl"></i>
                                <span class="fl">大学英语IV</span>
                                <em class="fl">成绩：78 </em>
                                <em class="fl">班平均分：64.12</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl pink"></i>
                                <span class="fl">概率与数理统计</span>
                                <em class="fl">成绩：82 </em>
                                <em class="fl">班平均分：69.4</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl pink"></i>
                                <span class="fl">多媒体技术</span>
                                <em class="fl">成绩：89 </em>
                                <em class="fl">班平均分：80</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl"></i>
                                <span class="fl">计算机安装与维护</span>
                                <em class="fl">成绩：90 </em>
                                <em class="fl">班平均分：86</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl"></i>
                                <span class="fl">高级语言程序设计 II </span>
                                <em class="fl">成绩：85 </em>
                                <em class="fl">班平均分：72.6</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl"></i>
                                <span class="fl">大学体育IV</span>
                                <em class="fl">成绩：82 </em>
                                <em class="fl">班平均分：86.3</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl"></i>
                                <span class="fl">毛概</span>
                                <em class="fl">成绩：88 </em>
                                <em class="fl">班平均分：74.5</em>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fl"></i>
                                <span class="fl">心理学</span>
                                <em class="fl">成绩：68 </em>
                                <em class="fl">班平均分：62.8</em>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection