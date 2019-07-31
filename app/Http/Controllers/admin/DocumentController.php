<?php

namespace App\Http\Controllers\admin;

use App\Http\Service\admin\DocumentService;
use App\Http\Controllers\Controller; 
use App\Http\Requests\DocumentRequest;

class DocumentController extends Controller
{
    protected $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    public function getAddDocument()
    {
        $data = [
            'listCategory' => $this->documentService->category(),
        ];

        return view('admin.pages.document.add', $data);
    }
    
    public function getListDocument()
    {
        return view('admin.pages.document.list', ['listDocument' => $this->documentService->listDocument()]); 
    }

    public function postAddDocument(DocumentRequest $request)
    {
        $this->documentService->addDocument($request->all());

        return redirect('admin/document/add')->with('thongbao', __('message.add.success'));
    }

    public function getEditDocument($id) {
        $data = [
            'olderDocument' => $this->documentService->olderDocument($id),
            'category' => $this->documentService->category(),
        ];

        return view('admin.pages.document.edit', $data);
    }
    
    public function postEditDocument(DocumentRequest $request, $id)
    {
        $this->documentService->postEditDocument($request->all(), $id);
        
        return redirect()->route('document.edit', ['id' => $id])->with('thongbao', __('message.edit.success'));
    }
}
