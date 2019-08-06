<?php

namespace App\Http\Service\ajax;

use App\Model\Document;

class AjaxService
{
    protected $documentModel;

    public function __construct(Document $document)
    {
        $this->documentModel = $document;
    }

    public function searchResult($keyWord)
    {
        $document = $this->documentModel->where('name', 'like', '%' . $keyWord . '%')->take(5)->get();

        return $document;
    }
}
