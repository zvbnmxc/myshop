@extends('admins.admin')

@section('body')
<body>
  <form action="{{url('user/doadd')}}" method="post">
   @csrf
    <br/>元老姓名:<input type="text" name="xm"><br/>
    <br/>元老称号:<input type="text" name="ch"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    <a href="{{url('user/list')}}">去看展示</a><hr/>
    </form>
</body>
@endsection
