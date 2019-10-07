@extends('admins.admin')

@section('title','登录')

@section('body')
<form class="layui-form" action="{{url('login/store')}}" method="POST">
@csrf
    账号:<input type="text" name="admin_name" placeholder="请输入用户名"><br/>
    密码:<input type="password" name="admin_pwd" placeholder="请输入密码"><br/>   
    点击:<input type="submit" value="立即登陆">
</form>
@endsection

@section('script')
<script>
</script>
@endsection