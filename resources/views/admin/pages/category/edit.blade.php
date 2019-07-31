@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{ trans('message.category.action') }}
                    <small>{{ trans('message.category.edit') }}</small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form method="post" action="{{ route('category.edit', ['id' => $category->id]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ trans('message.category.name') }}</label>
                        <input required="required" value="{{ $category->name }}" class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.category.type') }}</label>
                        <select class="form-control" name="type">
                            <option @if ($category->type == config('config.category.type.post')) {{'selected'}} @endif value="0">Bài viết</option>
                            <option @if ($category->type == config('config.category.type.document')) {{'selected'}} @endif value="1">Tài liệu tải</option>
                            <option @if ($category->type == config('config.category.type.example')) {{'selected'}}@endif value="2">Thi thử</option>
                            
                        <select >
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ trans('message.category.edit') }}</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
