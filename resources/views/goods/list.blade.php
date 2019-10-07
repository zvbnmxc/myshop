<!DOCTYPE html>
<html lang="en">
<head>
    <title>增删改查</title>
</head>
<a href="{{url('goods/add')}}">添加</a><hr/>
<form action="{{url('goods/list')}}" method="get">
    姓名:<input type="text" name="goods_name" value="{{$goods_name}}">
    <input type="submit" value="搜索">
</form><br/>
<body>
    <table border='1'>
        <tr>
            <td>ID号</td>
            <td>货物名称</td>
            <td>货物图片</td>
            <td>货物库存</td>
            <td>货物价格</td>
            <td>添加时间</td>
            <td>操作</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->goods_id}}</td>
            <td>{{$item->goods_name}}</td>
            <td><img src="{{$item->goods_tup}}" alt="" width="100"></td>
            <td>{{$item->goods_kc}}</td>
            <td>{{$item->goods_price}}</td>
            <td>{{date('Y-m-d H:i:s',$item->goods_time)}}</td>
            <td>
                <a href="{{url('goods/update')}}?goods_id={{$item->goods_id}}">修改</a>
                <a href="{{url('goods/shanchu')}}?goods_id={{$item->goods_id}}">删除</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['goods_name' => $goods_name ])->links() }}
</body>
</html>