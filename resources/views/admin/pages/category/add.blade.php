@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.category.action') }}
                    <small>{{ trans('message.category.add') }}</small>
                </h1>
            </div>
            <div class="col-lg-7">
                @if (count($errors)>0)
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
                <form method="post" action="{{route('category.add')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>{{ trans('message.category.name') }}</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('message.category.type') }}</label>
                        <select class="form-control" name="type">
                            <option value="0">{{ trans('message.category.post') }}</option>
                            <option value="1">{{ trans('message.category.document') }}</option>
                            <option value="2">{{ trans('message.category.exam') }}</option>
                        <select >
                    </div>
                    <div class="form-group">
                        <button>{{ trans('message.category.add') }}</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
