<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册页面</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/bootstrap.min.css')}}">
    <!-- jQuery 文件 -->
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <!-- Bootstrap JavaScript 文件 -->
    <script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#name").focus();
        });
                function leave()
                {
//                    alert('没了');
                    $.post("{{url('admin/jiance')}}",{'_token':'{{csrf_token()}}','username':$("#name").val()},function(data)
                    {
//                                        alert(data);//弹出返回值处理
                        //                $("#msg").text(data);
                        if(data==1){
                            $("#name").val("");
                            $("#mes").text("用户名已存在");
                            $("#name").focus();
                        }
                    });
                }
    </script>
</head>
<body>
<div class="jumbotron">
    <div class="container"><!--这是一个包含容器，为了使用栅格系统，注意栅格系统一行最多12列-->
        <h2>注册页面</h2>
    </div>
</div>
<div class="container" >
    <form class="form-horizontal" method="post" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">用户名:</label>
            <div class="col-sm-3">
                <input type="text" name="username" required="required" onblur="leave()"
                       value="{{old('username')?old('username'):''}}"
                       class="form-control" id="name" placeholder="请输入用户名">
            </div>
            <div class="col-sm-7">
                <p class="form-control-static text-danger" id="mes"></p>
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-sm-2 control-label">密码:</label>
            <div class="col-sm-3">
                <input type="password" name="password" required="required"
                       value="{{old('password')?old('password'):''}}"
                       class="form-control" id="age" placeholder="请输入密码">
            </div>
            <div class="col-sm-7">
                <p class="form-control-static text-danger"></p>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">注册</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>