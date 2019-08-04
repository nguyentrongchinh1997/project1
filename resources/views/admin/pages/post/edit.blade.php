@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.post.name') }}
                    <small>{{ trans('message.post.add') }}</small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form method="post" action="{{ route('post.edit', ['id' => $post->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ trans('message.post.title') }}</label>
                        <input required="required" value="{{$post->title}}" class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.category') }}</label>
                        <select class="form-control" name="category">
                            @foreach ($listCategory as $category)
                                <option @if($category->id == $post->category_id) {{ "selected" }} @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.image') }}</label><br>
                        <img src="upload/post/{{$post->image}}" width="200px">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.image') }} </label>
                        <input type="file" name="file" >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.content') }}</label>
                        <textarea name="content" id="demo" class="ckeditor">{!!$post->content!!}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ trans('message.post.edit') }}</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
