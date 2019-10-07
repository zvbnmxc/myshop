<body>
  <form action="{{url('goods2/doadd')}}" method="post" enctype="multipart/form-data">
   @csrf
    <br/>货物名称:<input type="text" name="goods_name"><br/>
    <br/>货物图片:<input type="file" name="goods_tup"><br/>
    <br/>货物库存:<input type="text" name="goods_kc"><br/>
    <br/>货物点评:<textarea name="goods_price"></textarea><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
    <a href="{{url('goods2/list')}}">去看展示</a><hr/>
</body>