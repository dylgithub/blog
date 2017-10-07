<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>Myweb</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="{{asset('static/bootstrap/css/bootstrap.min.css')}}">
    <!-- jQuery 文件 -->
    <script src="{{asset('static/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap JavaScript 文件 -->
    <script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}"></script>
    <style type="text/css">
        body{margin: 0;padding: 0;background-color: #DEDEDE;}
        a{text-decoration:none;}
        .header{padding:10px 50px 10px 50px;border-bottom: 1px solid #eeeeee;}
        .header>.logo{display:inline-block;}
        .header>.menu{display:inline-block;margin-left:20px;}
        .content{}
        .left{background-color: white;margin: 25px 300px 25px 25px;padding: 25px;box-shadow: 1px 1px 2px 1px #848484;}
        .right{background-color: white;width: 200px;margin: 25px;padding: 25px;box-shadow: 1px 1px 2px 1px #848484;position: absolute;top: 92px;right: 0;}
        .footer{padding:10px 50px 10px 50px;background-color:gray;}
    </style>
    <script>
        $(document).ready(function(){
            $.post("{{url('admin/jiazai')}}",{'_token':'{{csrf_token()}}'},function(data)
            {
//                alert(data);
                var proArr = eval("(" + data + ")");
                for ( var i = 0; i < proArr.length; ++i) {
                    var pro = proArr[i];//每个类别
                    //创建option
                    var optionEle = document.createElement("option");
                    optionEle.value=pro.name;//给每个option的赋实际值
                    var textNode=document.createTextNode(pro.name);
                    optionEle.appendChild(textNode);
                    document.getElementById("p").appendChild(optionEle);
                }
            });
        });
    </script>
</head>
<body>
<!-- header -->
<div class="header">
    <div class="logo">
        <h2>博客后台</h2>
    </div>
    <div class="menu">
        <a href="{{url('admin/index')}}">文章显示</a>
    </div>
</div>
<div class="content">
    <div class="left">
        <form action="" method="post">
            {{ csrf_field() }}
            <label>Title</label>
            <input type="text" id="title" name="title" style="width:100%;" value="{{ old('title') }}" required="required"><br>
            auther:<input type="text" name="auther" required="required"><br>
            category:<select name="category" id="p">
                <option>----请选择类别----</option>
                </select><br>
            <label>Content</label>
            <textarea name="content" rows="10" style="width:100%;">{{ old('content') }}</textarea>
            <button type="submit">添加</button>
        </form>
    </div>
    <div class="right">
    </div>
</div>
<!-- footer -->
<div class="footer">
    <p>contact me : 1234567</p>
</div>
</body>
</html>
