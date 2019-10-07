<body>
  <form action="{{url('login/doadd')}}" method="post">
   @csrf
    <br/>账号:<input type="text" name="admin_name"><br/>
    <br/>密码:<input type="text" name="admin_pwd"><br/>
    <br/>确认密码:<input type="text" name="admin_pwdd"><br/>
    <br/><input type="submit" value="立即注册"><br/>
    </form>
</body>