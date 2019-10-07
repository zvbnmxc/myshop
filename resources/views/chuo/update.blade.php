<body>
  <form action="{{url('chuo/edit')}}" method="post">
  <input type="hidden" name="id" value="{{$data->id}}">
   @csrf
    <br/>姓名:<input type="text" name="xm" value="{{$data->xm}}"><br/>
    <br/>介绍:<textarea name="jie" style="height:120px">{{$data->jie}}</textarea><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
</body>