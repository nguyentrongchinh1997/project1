<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Service\admin\DocumentService;

class DocumentController extends Controller
{
	protected $documentService;

	public function __construct(DocumentService $documentService)
	{
		$this->documentService = $documentService;
	}

    public function getAddDocument()
    {
    	return view("admin.pages.document.add", ["category" => $this->documentService->category()]);
    }
    
    public function getListDocument()
    {
    	return return view("admin.pages.document.list", ["document" => $this->documentService->listDocument()]); 
    }

    public function postAddDocument(DocumentRequest $request)
    {
    	$this->documentService->addDocument($request->all());

    	return redirect("admin/document/add")->with("thongbao", __('add.success'));
    }

    public function getEditDocument($id) {
        $data = [
            'olderDocument' => $this->documentService->olderDocument($id),
            'category' => $this->documentService->category(),
        ]

        return view("admin.pages.document.edit", $data);
    }

    public function postEditDocument(DocumentRequest $request, $id)
    {
    	$this->editDocument($request->all(), $id);

    	return redirect("admin/document/edit/$id")->with("thongbao", __('edit.success'));
    }
}
