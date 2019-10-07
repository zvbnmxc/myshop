<body>
  <form action="{{url('huochepiao/edit')}}" method="post" enctype="multipart/form-data">
  <input type="hgoods_idden" name="id" value="{{$data->id}}" disabled="disabled">
   @csrf
    <br/>车次:<input type="text" name="checi" value="{{$data->checi}}"><br/>
    <br/>到达站:<input type="text" name="daoda" value="{{$data->daoda}}"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
</body>