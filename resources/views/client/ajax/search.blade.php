@foreach ($document as $document)
<a href="{{ route('client.document.detail', ['unsigned_name' => $document->unsigned_name, 'id' => $document->id]) }}">
    <div class="row list-result">
        <div class="col-lg-2 search-image">
            <img src="{{ asset('/upload/document/poster/' . $document->image) }}">
        </div>
        <div class="col-lg-10">
            <p>
                {{$document->name}}
            </p>
            
        </div>
    </div>
</a>
@endforeach
