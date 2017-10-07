@extends('common.layouts2')
@section('content')
        <!--content start-->
<div id="say">
    <div class="weizi">
        <div class="wz_text">当前位置：<a href="{{url('index')}}">首页</a>><h1>碎言碎语</h1></div>
    </div>
    @foreach($shuos as $shuo)
    <ul class="say_box">
        <div class="sy">
            <p> {{$shuo->content}}</p>
        </div>
        <span class="dateview">{{$shuo->created_at}}</span>
    </ul>
        @endforeach
</div>
<!--content end-->
    @endsection