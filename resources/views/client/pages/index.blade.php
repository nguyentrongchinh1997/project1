@extends("client.layouts.index")

@section("content")
<div class="row" id="slide">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="image/banner.png" alt="..." width="100%">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="image/banner1.png" alt="..." width="100%">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
    </div>
</div>
<br>
<div class="row" id="content">
    <div class="container">
        <!-- Tài liệu mới nhất -->
        <div class="row">
            <div class="col-lg-12" style="padding: 0px">
                <h1>
                    <i class="fas fa-file-alt" style="color: #4d81ed"></i> {{ trans('message.client.index.new_document') }}
                </h1><hr>
            </div>
        </div>  
        
        <div class="row" style="background: #fff; padding: 15px 8px; border: 1px solid #e5e5e5">
            @foreach ($listDocumentNew as $document)
                <div class="col-lg-2 list-document">
                    <div class="document-image">
                        <a href="{{ route('client.document.detail', ['unsigned_name' => $document->unsigned_name, 'id' => $document->id]) }}">
                            <img alt="{{ $document->name }}" src="{{ asset ('upload/document/poster/' . $document->image) }}">
                        </a>
                        <table>
                            <tr>
                                <td style="text-align: left; padding-left: 8px;">
                                    <i class="far fa-eye"></i> 
                                    {{ $document->view == '' ? 0 : $document->view }}
                                </td>
                                <td style="text-align: center;">
                                    <i class="fas fa-download"></i> 
                                    {{ $document->download == '' ? 0 : $document->download }}
                                </td>
                                <td style="text-align: right; padding-right: 8px;">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="name">
                        <p>
                            <a href="{{ route('client.document.detail', ['unsigned_name' => $document->unsigned_name, 'id' => $document->id]) }}">
                                {{ $document->name }}
                            </a>
                        </p>
                    </div>
                    
                </div>
            @endforeach
        </div><br>
    <!-- end -->
        @foreach ($listCategory as $category)
            <div class="row">
                <div class="col-lg-12" style="padding: 0px">
                    <h1>
                        <i class="fas fa-file-alt" style="color: #4d81ed"></i> {{ $category->name }}
                        <span style="float: right; font-size: 20px; margin-top: 15px"><a href="{{ $category->unsigned_name }}/{{ $category->id }}">» {{ trans('message.client.index.all_view') }}</a></span>
                    </h1><hr>
                </div>
            </div> 
            <div class="row" style="background: #fff; padding: 15px 8px; border: 1px solid #e5e5e5">
                @foreach ($category->document as $document)
                    <div class="col-lg-2 list-document">
                        <div class="document-image">
                            <a href="{{ route('client.document.detail', ['unsigned_name' => $document->unsigned_name, 'id' => $document->id]) }}">
                                <img alt="{{ $document->name }}" src="{{ asset('/upload/document/poster/' . $document->image) }}">
                            </a>
                            <table>
                                <tr>
                                    <td style="text-align: left; padding-left: 8px;">
                                        <i class="far fa-eye"></i> 
                                        {{ $document->view == '' ? 0 : $document->view }}
                                    </td>
                                    <td style="text-align: center;">
                                        <i class="fas fa-download"></i> 
                                        {{ $document->download == '' ? 0 : $document->download }}
                                    </td>
                                    <td style="text-align: right; padding-right: 8px;">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="name">
                            <p>
                                <a href="{{ route('client.document.detail', ['unsigned_name' => $document->unsigned_name, 'id' => $document->id]) }}">
                                    {{ $document->name }}
                                </a>
                            </p>
                        </div>
                        
                    </div>
                @endforeach
            </div><br>
        @endforeach
    </div>
</div>
@endsection
