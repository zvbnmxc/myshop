<!DOCTYPE html>
<html lang="en">
<head>
    <title>增删改查</title>
</head>
<a href="{{url('ksksks/add')}}">添加</a><hr/>
<form action="{{url('ksksks/list')}}" method="get">
    姓名:<input type="text" name="name" value="{{$name}}">
    <input type="submit" value="搜索">
</form><br/>
<body>
    <table border='1'>
        <tr>
            <td>ID号</td>
            <td>姓名</td>
            <td>图片</td>
            <td>时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td><img src="{{$item->tel}}" alt="" width="200"></td>
            <td>{{date('Y-m-d H:i:s',$item->time)}}</td>
            <td>
                <a href="{{url('ksksks/update')}}?id={{$item->id}}">修改</a>
                <a href="{{url('ksksks/shanchu')}}?id={{$item->id}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['name' => $name ])->links() }}
</body>
</html>