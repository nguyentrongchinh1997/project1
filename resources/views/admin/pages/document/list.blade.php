@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.document_title')}}
                    <small>{{ trans('message.document.list')}}</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>{{ trans('message.document.image')}}</th>
                        <th>{{ trans('message.document.name')}}</th>
                        <th>{{ trans('message.document.type')}}</th>
                        <th>{{ trans('message.document.view')}}</th>
                        <th>{{ trans('message.document.download')}}</th>
                        <th>{{ trans('message.document.price')}}</th>
                        <th>{{ trans('message.document.category')}}</th>
                    </tr>
                </thead>
                @php $stt = 0; @endphp
                @foreach($listDocument as $document)
                    <tr>
                        <td>{{++$stt}}</td>
                        <td>
                            <img width="150px" src="upload/document/poster/{{$document->image}}">
                        </td>
                        <td>
                            <a href="{{ route('document.edit', ['id' => $document->id]) }}">
                                {{$document->name}}
                            </a>
                            
                        </td>
                        <td>
                            {{($document->type == config('config.document.type.free')) ? Miễn phí : Trả phí
                        </td>
                        <td>
                            <span>
                                {{($document->view == '') ? 0 : number_format($document->view}}
                            </span>
                        </td>
                        <td>
                            <span>
                                {{($document->dowload == '') ? 0 : number_format($document->dowload}}
                            </span>
                        </td>
                        <td>
                            <span>
                                {{($document->price == '') ? 0 : number_format($document->price}}đ
                            </span>
                        </td>
                        <td>
                            {{$document->category->name}}
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
