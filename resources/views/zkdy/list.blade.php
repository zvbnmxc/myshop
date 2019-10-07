<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/zkdy/list_do')}}" method="post">
    @csrf
        <tr>
           <td>调研项目：</td>
           <td><input type="text" name="dy"></td><br>
        </tr>
        <tr>
           <td></td>
           <td><input type="submit" value="添加调研"></td>
        </tr>
    </form>
</body>
</html>