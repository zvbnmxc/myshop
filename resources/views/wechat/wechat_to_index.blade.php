<table border="1">
	<tr>
		<td>id</td>
		<td>openid</td>
		<td>时间</td>
		<td>是否关注</td>
		<td>昵称</td>
		<td>性别</td>
		<td>城市</td>
		<td>头像</td>
	</tr>
	@foreach($res as $v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->openid}}</td>
		<td>{{date('Y-m-d',$v->add_time)}}</td>
		<td>{{$v->subscribe}}</td>
		<td>{{$v->nickname}}</td>
		<td>{{$v->sex}}</td>
		<td>{{$v->city}}</td>
		<td>< img src="{{$v->headimgurl}}"></td>
	</tr>
	@endforeach
</table>

//代码在这里
//https://github.com/mnmnwq/myShop/blob/master/app/Http/Controllers/Pay/AliPayController.php