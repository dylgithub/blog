<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>个人博客</title>
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="{{asset('static/css/index.css')}}"/>
    <link rel="stylesheet" href="{{asset('static/css/style.css')}}"/>
    <script type="text/javascript" src="{{asset('static/js/jquery-1.8.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('static/js/html5.js')}}"></script>
    <![endif]-->
    <script>
        function show()
        {
//            $("#newa").attr("");
            var $li=$("li[id='newli']");
            if($li.length==0)
            {
                $.post("{{url('articles/news')}}",{'_token':'{{csrf_token()}}'},function(data){
                    $("#u").html('');
                    $.each(data,function(i,item){
                        var $liEle=$("<li id='newli'></li>");
                        var next='{{url('articles/show/')}}'+'/'+item.id;
                        var tltle=item.title;
                        var $aEle='<a href="'+ next + '">'+'<p>'+tltle+'</p>'+'</a>';
                        $liEle.append($aEle);
                        $("#u").append($liEle);
                    });
                    {{--for ( var i = 0; i < proArr.length; ++i) {--}}
                        {{--var pro = proArr[i];//每个文章--}}
                        {{--var id=pro.id;--}}
    {{--//                    alert(pro.auther);--}}
                        {{--var $liEle=$("<li id='newli'></li>");--}}
                        {{--var $aEle=$("<a id='newa' href='#'></a>");--}}
                           {{--$aEle.attr("href","{{url('articles/show',["id"=>session('id')])}}");--}}
                        {{--$aEle.text(pro.title);--}}
                        {{--$liEle.append($aEle);--}}
                        {{--$("#u").append($liEle);--}}
    {{--//                var liEle = document.createElement("li");--}}
    {{--//                    var aEle = document.createElement("a");--}}
    {{--//                    aEle.setAttribute("href","articles/show/"+id);--}}
    {{--//                var textNode=document.createTextNode(pro.title);--}}
    {{--//                    aEle.appendChild(textNode);--}}
    {{--//                document.getElementById("u").appendChild(liEle);--}}
    {{--//                    liEle.appendChild(aEle);--}}
                {{--}--}}
                });
            }
//
        }
    </script>
</head>

<body>
<!--header start-->
<div id="header">
    <h1>个人博客</h1>
    <p>青春是打开了,就合不上的书。人生是踏上了，就回不了头的路，爱情是扔出了，就收不回的赌注。</p>
</div>
<!--header end-->
<!--nav-->
@include('common.nav')
<!--nav end-->
<!--content start-->
<div id="content">
    @section('left')
            @show
    <!--right-->
    <div class="right" id="c_right">
        <div class="s_about">
            <form method="post" action="{{url('articles/condition')}}">
                {{ csrf_field() }}
                <input type="text" name="condition" id="title" placeholder="请输入文章主题">
                <input type="submit" value="搜索">
            </form>
            <img src="{{asset('static/images/my.jpg')}}" width="230" height="230" alt="博主"/>
            <p>博主：XX</p>
            <p>职业：web前端、视觉设计</p>
            <p>简介：</p>
            <p>
                <a href="#" title="联系博主"><span class="left b_1"></span></a><a href="#" title="加入QQ群，一起学习！"><span class="left b_2"></span></a>
                <div class="clear"></div>
            </p>
        </div>
        <!--栏目分类-->
        <div class="lanmubox">
            <div class="hd">
                <ul><li><a href="{{url('articles/selecttop')}}">精心推荐</a></li><li>
                    <a id="newarc" href="javascript:void(0)" onmouseover="show()">最新文章</a></li></ul>
            </div>
            <div class="bd">
                <ul>
                    {{--@foreach($articles as $article)--}}
                    {{--<li><a href="{{url('articles/show',['id'=>$article->id])}}">{{$article->title}}</a></li>--}}
                    {{--@endforeach--}}
                    <li><a href="#" title="关于响应式布局">关于响应式布局</a></li>
                    <li><a href="#" title="如何创建个人博客网站">如何创建个人博客网站</a></li>
                    <li><a href="#" title="网站项目实战开发（二）">网站项目实战开发（二）</a></li>
                    <li><a href="#" title="为什么新站前期排名老是浮动？(转)">为什么新站前期排名老是浮动？(转)</a></li>
                </ul>
                <ul id="u">
                </ul>
            </div>
        </div>
        <!--end-->
        @yield('link')
    </div>
    <!--right end-->
    <div class="clear"></div>
</div>
<!--content end-->
<!--footer start-->
<div id="footer">
    <p>Use For:<a href="http://www.duanliang920.com" target="_blank">个人练习</a>
        <a href="{{url('admin/login')}}">后台入口</a>
    </p>
</div>
<!--footer end-->
<script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
<script  type="text/javascript" src="{{asset('static/js/nav.js')}}"></script>
</body>
</html>
