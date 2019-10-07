<!DOCTYPE html>
<html lang="en">
<head>
    <title>展示</title>
</head>
<a href="{{url('login/che')}}">注册管理员</a><hr/>
<form action="{{url('login/zhanshi')}}" method="get">
    姓名:<input type="text" name="admin_name" value="{{$admin_name}}">
    <input type="submit" value="搜索">
</form><br/>
<body>
    <table border='1'>
        <tr>
            <td>ID号</td>
            <td>账号</td>
            <td>密码</td>
            <td>操作</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->admin_name}}</td>
            <td>{{$item->admin_pwd}}</td>
            <td>
                <a href="{{url('login/update')}}?id={{$item->id}}">修改</a>
                <a href="{{url('login/shanchu')}}?id={{$item->id}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['admin_name' => $admin_name ])->links() }}
</body>
</html>