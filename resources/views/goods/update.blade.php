<body>
  <form action="{{url('goods/edit')}}" method="post" enctype="multipart/form-data">
  <input type="hgoods_idden" name="goods_id" value="{{$data->goods_id}}">
   @csrf
    <br/>货物名称:<input type="text" name="goods_name" value="{{$data->goods_name}}"><br/>
    <br/>货物图片:<input type="file" name="goods_tup"><br/>
    <img src="{{$data->goods_tup}}"><br/>
    <br/>货物库存:<input type="text" name="goods_kc" value="{{$data->goods_kc}}"><br/>
    <br/>货物价格:<input type="text" name="goods_price" value="{{$data->goods_price}}"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
</body>