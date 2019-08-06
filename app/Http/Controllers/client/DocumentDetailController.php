<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\client\DocumentDetailService;

class DocumentDetailController extends Controller
{
    protected $documentDetail;

    public function __construct(DocumentDetailService $documentDetail)
    {
        $this->documentDetail = $documentDetail;
    }
    
    public function viewDocumentDetail($unsignedName, $documentId)
    {
        $data = $this->documentDetail->viewDocumentDetail($documentId);

        return view('client.pages.document_detail', $data);
    }
}
