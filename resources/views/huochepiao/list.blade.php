<!DOCTYPE html>
<html lang="en">
<head>
    <title>增删改查</title>
</head>
<a href="{{url('huochepiao/add')}}">添加</a><hr/>
<form action="{{url('huochepiao/list')}}" method="get">
    出发站:<input type="text" name="chufazhan" value="{{$chufazhan}}">
    <input type="submit" value="搜索">
</form><br/>
<body>
    <table border='1'>
        <tr>
            <td>车次</td>
            <td>★出发站<br>☆到达站</td>
            <td>出发时间△ <br/> 到达时间▽</td>
            <td>历时</td>
            <td>特等座</td>
            <td>二等座</td>
            <td>无座</td>
            <td>卧铺</td>
            <td>其他</td>
            <td>备注</td>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->checi}}</td>
            <td>{{$item->chufazhan}}<br/>{{$item->daodazhan}}</td> 
            <td>{{date('H:i',$item->chufa)}}<br/>{{$item->daoda}}</td>
            <td><{{$item->lishi2}}><br/>{{$item->lishi1}}</td>
            <td>{{$item->yideng}}</td>
            <td>{{$item->erdeng}}</td>
            <td>{{$item->wuzuo}}</td>
            <td>{{$item->beizhu}}</td>
            <td>{{$item->qita}}</td>
            <td>
                <a href="{{url('huochepiao/update')}}?id={{$item->id}}">预订</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->appends(['chufazhan' => $chufazhan])->links() }}
</body>
</html>