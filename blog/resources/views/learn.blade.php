@extends('common.layouts')
@section('left')
<!--left-->
@if(isset($article))
    <div class="left" id="news">
        <div class="weizi">
            <div class="wz_text">当前位置：<a href="#">首页</a>><a href="#">学无止境</a>><span>文章内容</span></div>
        </div>
        <div class="news_content">
            <div class="news_top">
                <h1>浅谈：html5和html的区别</h1>
                <p>
                    <span class="left sj">时间:2014-8-9</span><span class="left fl">分类:学无止境</span>
                    <span class="left author">段亮</span>
                </p>
                <div class="clear"></div>
            </div>
            <div class="news_text">
                这几天真的太忙了，白天要上课，晚上还要策划客户的网站方案，经常弄到一两点才睡，也没什么时间去学习了。
                不过最近看群里聊天聊得最火热的莫过于手机网站和html5这两个词。可能有人会问，这两者有什么关系呢？随着这移动互联网快速发展的时代，
                尤其是4G时代已经来临的时刻，加上微软对"XP系统"不提供更新补丁、维护的情况下。"html5+css3"也逐渐的成为新一代web前端技术，
                手机网站也渐渐的成为一种趋势。什么是html5呢？<br/>
            </div>
        </div>
    </div>
    @else
    <div class="left" id="learn">
        <div class="weizi">
            <div class="wz_text">当前位置：<a href="{{url('index')}}">首页</a>><h1>学无止境</h1></div>
        </div>
        <div class="l_content">
            <!--wz-->
            @foreach($articles as $article)
            <div class="wz">
                <h3><a href="{{url('articles/show',['id'=>$article->id])}}">{{$article->title}}</a></h3>
                <dl>
                    <dt><img src="{{asset('static/images/s.jpg')}}" width="200"  height="123" alt=""></dt>
                    <dd>
                        <p class="dd_text_1">{{$article->content}}</p>
                        <p class="dd_text_2">
                            <span class="left author">{{$article->auther}}</span><span class="left sj">时间:{{$article->created_at}}</span>
                            <span class="left fl">分类:<a href="#" title="学无止境">{{$article->leibie}}</a></span><span class="left yd"><a href="{{url('articles/show',['id'=>$article->id])}}" title="阅读全文">阅读全文</a>
                            </span>
                        <div class="clear"></div>
                        </p>
                    </dd>
                    <div class="clear"></div>
                </dl>
            </div>
            @endforeach
            <!--wz end-->

        </div>
    </div>
    <!--end left -->
    @endif

    @endsection