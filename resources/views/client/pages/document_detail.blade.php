@extends("client.layouts.index")

@section("content")
<div class="row">
    <div class="container">
        <div class="col-lg-12" style="margin-top: 20px">
            <a href=""><i class="fas fa-home"></i> {{ trans('message.client.home') }} </a>
            <span> » </span>
            <a href="{{ route('client.category', ['unsigned_name' => $detailDocument->category->unsigned_name, 'id' => $detailDocument->category->id]) }}">
                {{ $detailDocument->category->name }}
            </a>
            <span> » </span>
            <a href="{{ route('client.document.detail', ['unsigned_name' => $detailDocument->unsigned_name, 'id' => $detailDocument->id]) }}">
                {{ $detailDocument->name }}
            </a>
        </div>
        <div class="col-lg-9">
            <h1 style="font-size: 25px; font-weight: bold;">
                {{$detailDocument->name}}
            </h1>
            <p>
                <span style="color: #727272">
                    {{ trans('message.client.detail_document.page_number') }}: <i class="far fa-file-alt"></i> <b>{{ $detailDocument->page }}</b> | 
                    {{ trans('message.client.detail_document.file_type') }}: <i class="far fa-file-pdf"></i> <b>{{ $detailDocument->format }}</b> | 
                    {{ trans('message.client.detail_document.view') }}: <i class="far fa-eye"></i> 
                        <b>
                            {{ $detailDocument->view == '' ? 0 : $detailDocument->view}}
                        </b>
                    {{ trans('message.client.detail_document.download_number') }}: <i class="fas fa-download"></i>
                        <b>
                            {{ $detailDocument->download == '' ? 0 : $detailDocument->download}}
                        </b>
                <!--
                    - In số tiền tài liệu nếu tài liệu đó mất phí tải
                    - Kiếm tra xem đã đăng nhập chưa
                    - Nếu chưa đăng nhập thì quuay sang trang đăng nhập
                    - Nếu đăng nhập rồi thì được khi tài liệu đó free hoặc nếu có phí thì số dư tài khoản phải >= giá tài liệu
                -->
                    <span style="float: right;">
                        <span style="color: #000; font-weight: bold; padding-right: 20px; font-size: 20px;">
                            {{ $detailDocument->type == config('config.document.type.pay') ? number_format($detailDocument->price).'đ' : '' }}
                        </span>
                        @guest
                            <a style="border-radius: 4px; color: #fff; background: #4d81ed; padding: 10px 15px" onclick="return login()" href="login">
                                <i class="fas fa-download"></i> {{ trans('message.client.detail_document.download') }}</a>
                            </a>
                        @else
                            <a style="border-radius: 4px; color: #fff; background: #4d81ed; padding: 10px 15px" 
                                @if ($detailDocument->type == config('config.document.type.free') || $detailDocument->price <= Auth::user()->balance) 
                                    href=" {{ asset('/upload/document/file/' . $detailDocument->url_document) }} " @else onclick="notification()" 
                                @endif
                            >
                            <i class="fas fa-download"></i> {{ trans('message.client.detail_document.download') }}</a>
                        @endguest
                    </span>
                <!-- end -->
                </span>
            </p>
            <br>
            @if ($detailDocument->type == config('config.document.type.pay'))
                <div class="preview">
                    <center>
                        @for ($i = 1; $i<= $detailDocument->preview; $i++)
                            <p>{{ trans('message.client.detail_document.page') }}: {{ $i }}</p>
                            <img src="{{ asset('/upload/preview/' . $detailDocument->unsigned_name . '-' . $detailDocument->id . '-' . $i) }}">
                        @endfor
                    </center>
                </div>
            @else
                <iframe src="{{ asset('/upload/document/file/' . $detailDocument->url_document) . '.pdf' }}" style="width:100%; height:700px; margin-bottom: 20px" frameborder="0"></iframe>
            @endif

            <br>
            <div class="dicription">
                <h3>{{ trans('message.client.detail_document.dicription') }}</h3><br>
                {!!$detailDocument->dicription!!}
            </div>
        </div>      
    </div>
</div>
@endsection
