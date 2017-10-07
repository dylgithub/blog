@extends('common.layouts3')

@section('content')
    <form action="" method="post">
        {{ csrf_field() }}
        <label>Title</label>
        <input type="text" name="title" style="width:100%;"
               value="{{old('title') ? old('title') : (isset($article->title)?$article->title:'') }}" required="required">
        <label>Content</label>
        <textarea name="content" rows="10" style="width:100%;">{{old('content') ? old('content') : (isset($article->content)?$article->content:'') }}</textarea>
        <button type="submit">确定</button>
    </form>
@endsection