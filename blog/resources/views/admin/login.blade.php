<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台登录</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="jumbotron">
        <div class="container"><!--这是一个包含容器，为了使用栅格系统，注意栅格系统一行最多12列-->
            <h2>登录页面</h2>
            <a href="{{url('admin/register')}}">前去注册</a>
        </div>
    </div>
    @if(Session::has('fail'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('fail')}}
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('success')}}
        </div>
    @endif
     <div class="container" >
            <form class="form-horizontal" method="post" action="{{url('admin/login')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">用户名:</label>
                    <div class="col-sm-3">
                        <input type="text" name="username" required="required"
                               value="{{old('username')?old('username'):''}}"
                               class="form-control" id="name" placeholder="请输入用户名">
                    </div>
                    <div class="col-sm-7">
                        <p class="form-control-static text-danger"></p>
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
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
         </div>
    <!-- jQuery 文件 -->
    <script src="{{asset('static/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap JavaScript 文件 -->
    <script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>