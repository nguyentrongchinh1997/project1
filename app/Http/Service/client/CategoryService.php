<?php

namespace App\Http\Service\client;

use App\Model\Document;
use App\Model\Category;

class CategoryService
{
    protected $document, $category;

    public function __construct(Document $document, Category $category)
    {
        $this->document = $document;
        $this->category = $category;
    }

    public function listDocument($categoryId)
    {
        $listDocument = $this->document->where('category_id', $categoryId)->paginate(24);
        $categoryName = $this->category->where('id', $categoryId)->first();
        $data = [
            'categoryName' => $categoryName,
            'listDocument' => $listDocument,
        ];

        return $data;
    }
}
