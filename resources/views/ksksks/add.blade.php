<body>
  <form action="{{url('ksksks/doadd')}}" method="post" enctype="multipart/form-data">
   @csrf
    <br/>姓名:<input type="text" name="name"><br/>
    <br/>图片:<input type="file" name="tel"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
    <a href="{{url('ksksks/list')}}">去看展示</a><hr/>
</body>