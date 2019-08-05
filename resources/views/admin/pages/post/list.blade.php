@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.post.name') }}
                    <small>{{ trans('message.post.list') }}</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>{{ trans('message.post.title') }}</th>
                        <th>{{ trans('message.post.unsigned_title') }}</th>
                        <th>{{ trans('message.post.category') }}</th>
                        <th>{{ trans('message.post.date') }}</th>
                        <th>{{ trans('message.post.delete') }}</th>
                    </tr>
                </thead>
                    @php $stt = 0; @endphp
                    @foreach ($listPost as $post)
                        <tr>
                            <td>{{++$stt}}</td>
                            <td>
                                <a href="{{ route('post.edit', ['id' => $post->id]) }}">
                                    {{$post->title}}
                                </a>
                                
                            </td>
                            <td>
                                {{$post->unsigned_title}}
                            </td>
                            <td>
                                {{$post->category->name}}
                            </td>
                            <td>
                                {{$post->date}}
                            </td>
                            <td>
                                <a onclick="return xoa()" href="{{ route('post.delete', ['id' => $post->id]) }}">
                                    Xóa 
                                </a>
                            </td>
                        </tr>
                    @endforeach 
                
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
