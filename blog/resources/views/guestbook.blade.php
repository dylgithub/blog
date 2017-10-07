@extends('common.layouts')
@section('left')
        <!--left-->
<div class="left" id="guestbook">
    <div class="weizi">
        <div class="wz_text">当前位置：<a href="{{url('index')}}">首页</a>><h1>留言板</h1></div>
    </div>
    <div class="g_content">
        有什么想对我说的嘛？
        <form action="" method="post">
            {{ csrf_field() }}
            <textarea name="content" rows="20" style="width:100%;"></textarea>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<!--end left -->
@endsection