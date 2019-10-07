<body>
  <form action="{{url('huochepiao/doadd')}}" method="post" enctype="multipart/form-data">
   @csrf
    <br/>车次:<input type="text" name="checi"><br/>
    <br/>出发站:<input type="text" name="chufazhan"><br/>
    <br/>到达站:<input type="text" name="daodazhan"><br/>
    <br/>出发时间:<input type="text" name="chufa"><br/>
    <br/>到达时间:<input type="text" name="daoda"><br/>
    <br/>历时:<input type="text" name="lishi1"><br/>
    <br/>几日到达:<input type="text" name="lishi2"><br/>
    <br/>特等座:<input type="text" name="tedeng"><br/>
    <br/>一等座:<input type="text" name="yideng"><br/>
    <br/>二等座:<input type="text" name="erdeng"><br/>
    <br/>无座:<input type="text" name="wuzuo"><br/>
    <br/>卧铺:<input type="text" name="beizhu"><br/>
    <br/>其他:<input type="text" name="qita"><br/>
    <br/><input type="submit" value="立即提交"><br/>
    </form>
    <a href="{{url('huochepiao/list')}}">去看展示</a><hr/>
</body>