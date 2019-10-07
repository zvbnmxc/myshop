<body>
  <form action="{{url('user/edit')}}" method="post">
  <input type="hidden" name="id" value="{{$data->id}}">
   @csrf
    <br/>学生姓名:<input type="text" name="xm" value="{{$data->xm}}"><br/>
    <br/>学生称号:<input type="text" name="ch" value="{{$data->ch}}"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
</body>