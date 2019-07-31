@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.category.action') }}
                    <small>{{ trans('message.category.list') }}</small>
                </h1>
            </div>
            @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>{{ trans('message.category.stt') }}</th>
                        <th>{{ trans('message.category.name') }}</th>
                        <th>{{ trans('message.category.unsigned_name') }}</th>
                        <th>{{ trans('message.category.type') }}</th>
                        
                        <th>{{ trans('message.category.delete') }}</th>
                    </tr>
                </thead>
                @php $stt = 0; @endphp
                @foreach ($listCategory as $category)
                    <tr>
                        <td>{{ ++$stt }}</td>
                        <td>
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}">
                                {{ $category->name }}
                            </a>
                            
                        </td>
                        <td>
                            {{ $category->unsigned_name }}
                        </td>
                        <td>
                            @if ($category->type == config('config.category.type.document'))
                                <span>{{ trans('message.category.document') }}</span>
                            @elseif ($category->type == config('config.category.type.example'))
                                <span>{{ trans('message.category.exam') }}</span>
                            @else
                                <span>{{ trans('message.category.post') }}</span>
                            @endif
                        </td>
                       
                        <td>
                            <center>
                                <a onclick='return xoa()' href="{{ route('category.delete', ['id' => $category->id]) }}">{{ trans('message.category.delete') }}</a>
                            </center>
                            
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
