<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\ajax\AjaxService;

class AjaxController extends Controller
{
    protected $ajaxService;

    public function __construct(AjaxService $ajaxService)
    {
        $this->ajaxService = $ajaxService;
    }
    
    public function searchResult($keyWord)
    {
        $document = $this->ajaxService->searchResult($keyWord);
        
        if (count($document) > 0) {
            $data = [
                'document' => $document,
            ];

            return view('client.ajax.search', $data);
        } else {
            return view('client.ajax.not_found');
        }
    }
}
