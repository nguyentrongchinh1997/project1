@extends("client.layouts.index")

@section("content")
<br>
<div class="row" id="content">
    <div class="container">
        <div class="row">
            <center>
                <h2><i class="fas fa-file-alt" style="color: #4d81ed"></i> {{ trans('message.client.category.document') }} {{ $categoryName->name }}</h2>
            </center>
        </div>
        <br>
        <div class="row">
                @foreach ($listDocument as $document)
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
        </div>
    </div>
</div>
@endsection("content")
