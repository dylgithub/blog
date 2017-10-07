<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>个人博客</title>
    <meta name="keywords" content="个人博客" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="{{asset('static/css/index.css')}}"/>
    <link rel="stylesheet" href="{{asset('static/css/style.css')}}"/>
    <script type="text/javascript" src="{{asset('static/js/jquery1.42.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="{{asset('static/js/html5.js')}}"></script>
    <![endif]-->
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
@section('content')
        @show
<!--content end-->
<!--footer start-->
<div id="footer">
    <p>Use For:<a href="http://www.duanliang920.com" target="_blank">个人练习</a></p>
</div>
<!--footer end-->
<script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
<script  type="text/javascript" src="{{asset('static/js/nav.js')}}"></script>
</body>
</html>
