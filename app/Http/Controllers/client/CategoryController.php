<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\client\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function viewCategory($unsignedName, $categoryId)
    {
        $data = $this->categoryService->listDocument($categoryId);

        return view('client.pages.category', $data);
    }
}
