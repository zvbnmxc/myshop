<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="/jquery-3.3.1.js"></script>
</head>
  <form action="{{url('zkdy/edit')}}" method="post" enctype="multipart/form-data">
  <input type="hgoods_idden" name="id" value="{{$data->id}}" disabled="disabled">
   @csrf
    <br/>调研问题:<input type="text" name="name" value="{{$data->dy}}"><br/>
   

    <form action="{{url('stratot_list_add')}}" method="post">
    @csrf
        <select class="bb">
            <option>--问题选项--</option>
            <option value="单选">单选</option>
            <option value="多选">多选</option>  
        </select>
        <div class="radio">
        <input type="radio" name="aa">A<input type="text" name="aa"><br>
        <input type="radio" name="bb">B<input type="text" name="bb"><br>
        <input type="radio" name="cc">C<input type="text" name="cc"><br>
        <input type="radio" name="dd">D<input type="text" name="dd"><br>
        <input type="submit" value="添加">
    </div>
     </form>
     <form action="{{url('strator_list_acc')}}" method="post">
       @csrf
        <div class="checkbox">
            <input type="checkbox">A<input type="text" name="a"><br>
            <input type="checkbox">B<input type="text" name="b"><br>
            <input type="checkbox">C<input type="text" name="c"><br>
            <input type="checkbox">D<input type="text" name="d"><br>
            <input type="submit" value="添加">
        </div>
    </form>
 
    <br/><input type="submit" value="立即提交"><br/>
    </form>  
</body>
</html>
<script>
    $(function(){
        $('.radio').hide();
        $('.checkbox').hide();
        $('.cc').hide();
        $('.bb').click(function(){
            var name=$(this).val();
            if(name=='单选'){
                $('.radio').show();
                $('.checkbox').hide();
                $('.cc').hide();
            };
            if(name=='多选'){
                $('.checkbox').show();
                $('.radio').hide();
                $('.cc').hide();
            };
        });
    });
</script>