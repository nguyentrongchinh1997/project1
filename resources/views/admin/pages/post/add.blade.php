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
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{ $err }}<br>
                        @endforeach    
                    </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form method="post" action="{{ route('post.add') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ trans('message.post.title') }}</label>
                        <input class="form-control" type="text" name="title">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.category') }}</label>
                        <select class="form-control" name="category">
                            @foreach($listCategory as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.image') }}</label>
                        <input type="file" class="form-group" name="file">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.post.content') }}</label>
                        <textarea name="content" id="demo" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ trans('message.post.add') }}</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
