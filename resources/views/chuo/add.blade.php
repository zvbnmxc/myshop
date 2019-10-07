<body>
  <form action="{{url('chuo/doadd')}}" method="post">
  @if ($errors->any())
      <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
                {{ $error }}
          @endforeach
      </div>
  @endif

   @csrf
    <br/>姓名:<input type="text" name="xm"><br/>
    <br/>介绍:<textarea name="jie"></textarea><br/>
    <br/><input type="submit" value="立即提交"><br/>
    <a href="{{url('chuo/list')}}">去看展示</a><hr/>
    </form>
</body>