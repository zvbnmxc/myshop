<!DOCTYPE html>
<html lang="en">
<head>
    <title>留言展示</title>
</head>
<form action="{{url('pinglun/list1')}}" method="get">
    姓名:<input type="text" name="u_name" value="{{$u_name}}">
    <input type="submit" value="搜索">
</form><br/>
<body>
    <table border='1'>
        <tr>
            <td>编号</td>
            <td>留言内容</td>
            <td>姓名</td>
            <td>时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->ly}}</td>
            <td>{{$item->u_name}}</td>
            <td>{{date('Y-m-d H:i:s',$item->addtime)}}</td>
            <td>
                <a href="{{url('pinglun/shanchu')}}?id={{$item->id}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['u_name' => $u_name ])->links() }}
</body>
</html>