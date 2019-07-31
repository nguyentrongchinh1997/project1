@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.admin.document') }}
                    <small>{{ trans('message.admin.add') }}</small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach    
                </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <form method="post" action="{{ route('document.add') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ trans('message.document.name') }}</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.type') }}</label>
                        <select class="form-control" id="type" name="type">
                            <option value="0">Miễn phí</option>
                            <option value="1">Trả phí</option>
                        <select >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.category') }}</label>
                        <select class="form-control" name="category_id">
                            @foreach($listCategory as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.price') }}</label>
                        <input id="price" type="number" class="form-control" name="price">
                        <input type="hidden" name="price_hidden">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.avatar') }}</label>
                        <input type="file" name="poster">
                    </div>
                    <div>
                        <label>{{ trans('message.document.file') }}</label>
                        <input type="file"  name="document">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.preview') }}</label>
                        <input id="preview" class="form-control" type="number" name="preview">
                        <input type="hidden" name="preview_hidden">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.page') }}</label>
                        <input id="number_page" class="form-control" type="number" name="page">
                    </div>
                    
                    <div class="form-group">
                        <label>{{ trans('message.document.dicription') }}</label>
                        <textarea id="demo" name="dicription" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ trans('massege.document.add') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
