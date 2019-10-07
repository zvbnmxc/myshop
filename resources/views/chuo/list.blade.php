<!DOCTYPE html>
<html lang="en">
<head>
    <title>增删改查</title>
</head>
<a href="{{url('chuo/add')}}">添加</a><hr/>
<form action="{{url('chuo/list')}}" method="get">
    姓名:<input type="text" name="xm" value="{{$xm}}">
    <input type="submit" value="搜索">
</form><br/>
<body>
    <table border='1'>
        <tr>
            <td>ID号</td>
            <td>姓名</td>
            <td>介绍</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->xm}}</td>
            <td>{{$item->jie}}</td>
            <td>{{date('Y-m-d H:i:s',$item->addtime)}}</td>
            <td>
                <a href="{{url('chuo/update')}}?id={{$item->id}}">修改</a>
                <a href="{{url('chuo/shanchu')}}?id={{$item->id}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['xm' => $xm ])->links() }}
</body>
</html>