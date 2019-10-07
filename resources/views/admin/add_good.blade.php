<!DOCTYPE html>
<html lang="en">
<head>
    <title>微商城-添加商品</title>
</head>
<body>
    <form action="{{url('do_add_good')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="good_source">
    <input type="submit" value="上传">
    </form>
</body>
</html>