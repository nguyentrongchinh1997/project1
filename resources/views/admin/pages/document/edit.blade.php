@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài liệu
                    <small>Sửa</small>
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
                <form method="post" action = "{{ route('document.edit', ['id' => $olderDocument->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ trans('message.document.name') }}</label>
                        <input value="{{ $olderDocument->name }}" class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.type') }}</label>
                        <select class="form-control" id="type" name="type">
                            <option @if ($olderDocument->type == config('config.document.type.free')) {{ "selected" }} @endif value="0">Miễn phí</option>
                            <option @if ($olderDocument->type == config('config.document.type.pay'))) {{ "selected" }} @endif value="1">Trả phí</option>
                        <select >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.price') }}</label>
                        <input value="{{ $olderDocument->price }}" id="price" type="number" class="form-control" name="price">
                        <input type="hidden" name="price_hidden">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.avatar') }}</label><br>
                        <img src="upload/document/poster/{{ $olderDocument->image }}" width="200px">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.avatar') }}</label>
                        <input type="file" name="poster">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.file') }}</label><br>
                        <button>
                            <a href="upload/document/file/{{ $olderDocument->url_document }}">Xem</a>
                        </button>
                        
                    </div>
                    <div>
                        <label>{{ trans('message.document.file') }}</label>
                        <input type="file" name="document">
                    </div><br>
                    <div class="form-group">
                        <label>{{ trans('message.document.preview') }}</label>
                        <input value="{{ $olderDocument->preview }}" id="preview" class="form-control" type="number" name="preview">
                        <input type="hidden" name="preview_hidden">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.page') }}</label>
                        <input value="{{ $olderDocument->page }}" id="number_page" class="form-control" type="number" name="page">

                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.category') }}</label>
                        <select class="form-control" name="category_id">
                            @foreach($category as $category)
                                <option @if ($category->id == $olderDocument->id_category) {{ "selected" }} @endif value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        <select >
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.document.dicription') }}</label>
                        <textarea id="demo" name="dicription" class="ckeditor">{!!$olderDocument->dicription!!}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">{{ trans('message.document.edit') }}</button>
                    </div>
                </form>        
            </div>
        </div>
    </div>
</div>
@endsection
