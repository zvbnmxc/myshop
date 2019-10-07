<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>首页</title>
		<link rel="stylesheet" href="/admins/css/page.css" />
		<script type="text/javascript" src="/admins/js/jquery.min.js" ></script>
		<script type="text/javascript" src="/admins/js/index.js" ></script>
	</head>

	<body>
		<div class="left">
			<div class="bigTitle">后台管理系统</div>
			<div class="lines">
				<div onclick="pageClick(this)" class="active"><img src="/admins/img/icon-1.png" /><a href="{{url('goods/add')}}">商品管理</a></div>
				<div onclick="pageClick(this)" class="active"><img src="/admins/img/icon-1.png" /><a href="{{url('goods2/add')}}">商品管理2</a></div>
				<!-- <div onclick="pageClick(this)">               <img src="/admins/img/icon-2.png" /><a href="{{url('login/zhanshi')}}">个人信息管理</a></div> -->
				<!-- <div onclick="pageClick(this)">               <img src="/admins/img/icon-3.png" /><a href="{{url('huochepiao/add')}}">火车票</a></div> -->
				<!-- <div onclick="pageClick(this)">               <img src="/admins/img/icon-4.png" /><a href="{{url('chuo/add')}}">收货地址管理</div> -->
				<!-- <div onclick="pageClick(this)">               <img src="/admins/img/icon-5.png" /><a href="{{url('login/index')}}">登录</a></div> -->
				<div onclick="pageClick(this)">               <img src="/admins/img/icon-5.png" /><a href="{{url('zkdy/add')}}">调研</a></div>
				<div onclick="pageClick(this)">               <img src="/admins/img/icon-5.png" /><a href="{{url('pinglun/add')}}">评论</a></div>
				<div onclick="pageClick(this)">               <img src="/admins/img/icon-5.png" /><a href="{{url('wechat/user_list')}}">微信号</a></div>
			</div>
		</div>
		<div class="top">
			<div class="leftTiyle" id="flTitle">业务人员管理</div>
			<div class="thisUser">当前用户：吴亦凡</div>
		</div>
		<div class="content">
				@section('body')
				@show
		</div>
		<div style="text-align:center;">
				<p>更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
        </div>
		
	</body>

</html>