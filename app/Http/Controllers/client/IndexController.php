<?php

namespace App\Http\Controllers\client;

use App\Http\Service\client\IndexService;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    protected $document;

    public function __construct(IndexService $document)
    {
        $this->document = $document;
    }

    public function viewHome()
    {
        $data = $this->document->getData();

        return view('client.pages.index', $data);
    }
}
