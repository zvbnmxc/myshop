<body>
  <form action="{{url('goods/doadd')}}" method="post" enctype="multipart/form-data">
   @csrf
    <br/>货物名称:<input type="text" name="goods_name"><br/>
    <br/>货物图片:<input type="file" name="goods_tup"><br/>
    <br/>货物库存:<input type="text" name="goods_kc"><br/>
    <br/>货物价格:<input type="text" name="goods_price"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
    <a href="{{url('goods/list')}}">去看展示</a><hr/>
</body>