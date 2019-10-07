<body>
  <form action="{{url('ksksks/edit')}}" method="post" enctype="multipart/form-data">
  <input type="hgoods_idden" name="id" value="{{$data->id}}">
   @csrf
    <br/>姓名:<input type="text" name="name" value="{{$data->name}}"><br/>
    <br/>图片:<input type="file" name="tel"><br/>
    <img src="{{$data->tel}}"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
</body>