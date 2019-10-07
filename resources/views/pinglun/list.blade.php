<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form action="{{url('/pinglun/list_do')}}" method="post">
   @csrf
      <table>
       <tr>
            <td>内容</td>
            <td><textarea name="ly"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="发布"></td>
        </tr>
        </table>
   </form>
</body>
</html>