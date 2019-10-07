<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<a href="{{url('zkdy/list')}}">添加</a><hr/>
<form action="{{url('zkdy/list_list')}}" method="get">
 
</form><br/>
<body>
    <table border="1">
            <tr>
                <td>ID</td>
                <td>调研项目</td>
                <td>调研问题</td>
            </tr>
            @foreach($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->dy}}</td>
                <td>
                    <a href="{{url('zkdy/list_fff')}}?id={{$item->id}}">启用</a>
                    <a href="{{url('zkdy/del')}}?id={{$item->id}}">删除</a>
                </td>
            </tr>
            @endforeach
        
        </table>
        {{ $data->links() }}
</body>
</html>