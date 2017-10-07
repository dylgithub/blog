@extends('common.layouts')
@section('left')
        <!--left-->
<div class="left" id="news">
    <div class="weizi">
        <div class="wz_text">当前位置：<a href="{{url('index')}}">首页</a>><a href="{{url('learn')}}">学无止境</a>><span>文章内容</span></div>
    </div>
    <div class="news_content">
        <div class="news_top">
            <h1>{{$article->title}}</h1>
            <p>
                <span class="left sj">时间:{{$article->created_at}}</span><span class="left fl">分类:{{$article->leibie}}</span>
                <span class="left author">{{$article->auther}}</span>
            </p>
            <div class="clear"></div>
        </div>
        <hr>
        <div class="news_text">
            {{$article->content}}
        </div>
    </div>
    <div>
        发表评论:<br>
        <form action="{{url('articles/comment',['id'=>$article->id])}}" method="post">
            {{ csrf_field() }}
            <textarea name="content" style="width: 80%;" rows="10" required="required"></textarea><br>
            <input type="submit" value="评论">
        </form>
    </div>
    上一篇:<a href="{{isset($prearticle)?(url('articles/show',['id'=>$prearticle->id])):'#'}}">{{isset($prearticle)?$prearticle->title:'没有上一篇了'}}</a><br>
    下一篇:<a href="{{isset($nextarticle)?(url('articles/show',['id'=>$nextarticle->id])):'#'}}">{{isset($nextarticle)?$nextarticle->title:'没有下一篇了'}}</a>
</div>
<!--end left -->
    @endsection