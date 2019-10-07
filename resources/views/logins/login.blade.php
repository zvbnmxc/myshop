<html>
    <head>
        <title>登录</title>
    </head>
    <body>
    <center>
        <h1>登录</h1>
        <table border="1">
            <tr>
                <td>用户名:<input type="text"></td>
            </tr>
            <tr>
                <td>密 &nbsp; 码:<input type="password"></td>
            </tr>
            <tr>
                <td>第三方登录:<button id="wechat_btn" type="button">微信授权登录</button></td>
            </tr>
        </table>
    </center>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script>
        $(function(){
            $('#wechat_btn').click(function(){
                window.location.href="{{url('/logins/wechat_login')}}";
            });
        });
    </script>
    </body>
</html>
