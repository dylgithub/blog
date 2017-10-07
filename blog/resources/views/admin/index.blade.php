@extends('common.layouts3')
@section('content')
    <a href="{{ url('admin/create') }}" style="padding:5px;border:1px dashed gray;">
        + 添加文章
    </a>
    @foreach($articles as $article)
        <div style="border:1px solid gray;margin-top:20px;padding:20px;">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            <a href="{{ url('admin/preedit',$article->id) }}" style="padding:5px;">
                编辑
            </a>
            <a href="{{ url('admin/delete',$article->id) }}"
               onclick="if(confirm('您确定要删除吗？')==false) return false;" style="padding:5px;">
                删除
            </a>
        </div>
    @endforeach
    <div class="pull-right">
        {{$articles->render()}}
    </div>
@endsection
