<?php

namespace App\Http\Service\admin;

use App\Model\Document;
use App\Model\Category;

class DocumentService
{
    protected $documentModel, $categoryModel;

    public function __construct(Document $document, Category $category)
    {
        $this->documentModel = $document;
        $this->categoryModel = $category;
    }
    /**
     * lấy các chuyên mục liên quan đến tài liệu (type =1 )
     */
    public function category()
    {
        $category = $this->categoryModel->where('type', config('config.category.type.document'))->get();

        return $category;
    }

    public function listDocument()
    {
        $document = $this->documentModel->all();

        return $document;
    }

    public function addDocument($inputs)
    {
        return $this->documentModel->create([
            'name' => $inputs['name'],
            'unsigned_name' => str_slug($inputs['name']),
            'dicription' => $inputs['dicription'],
            'type' => $inputs['type'],
            'price' => $this->price($inputs),
            'image' => $this->upload($inputs['poster'], $inputs['name'], 'upload/document/poster'),
            'url_document' => $this->upload($inputs['document'], $inputs['name'], 'upload/document/file'),
            'preview' => $this->preview($inputs),
            'view' => 0,
            'download' => 0,
            'page' => $inputs['page'],
            'format' => $this->formatDocument($inputs['document']),
            'category_id' => $inputs['category_id'],
            'date' => date('Y-m-d H:i:s'),
        ]);
    }

    public function price($inputs)
    {
        if ($inputs['type'] == config('config.document.type.free')) {
            return $inputs['price_hidden'];
        } else {
            return $inputs['price'];
        }
    }

    public function preview($inputs)
    {
        if ($inputs['type'] == config('config.document.type.free')) {
            return $inputs['preview_hidden'];
        } else {
            return $inputs['preview'];
        }
    }

    public function upload($inputs, $name, $path)
    {
        if (!is_null($inputs)) {
            $nameFile = str_slug($name) . '-' . rand();
            $inputs->move($path, $nameFile);

            return $nameFile;
        }
    }

    public function formatDocument($inputs)
    {
        return $inputs->getClientOriginalExtension();
    }

    public function olderDocument($id)
    {
        $olderDocument = $this->documentModel->findOrFail($id);
        
        return $olderDocument;
    }
    
    public function postEditDocument($inputs, $id)
    {
        $olderDocument = $this->documentModel->findOrFail($id);

        if (isset($inputs['poster'])) {
            $namePoster = $this->upload($inputs['poster'], $inputs['name'], 'upload/document/poster');
        } else {
            $namePoster = $olderDocument->image;
        }
        if (isset($inputs['document'])) {
            $nameDocument = $this->upload($inputs['document'], $inputs['name'], 'upload/document/file');
            $format = $this->formatDocument($inputs['document']);
        } else {
            $nameDocument = $olderDocument->url_document;
            $format = $olderDocument->format;
        }

        $olderDocument->name = $inputs['name'];
        $olderDocument->unsigned_name = str_slug($inputs['name']);
        $olderDocument->dicription = $inputs['dicription'];
        $olderDocument->type = $inputs['type'];
        $olderDocument->price = $this->price($inputs);
        $olderDocument->image = $namePoster;
        $olderDocument->url_document = $nameDocument;
        $olderDocument->preview = $this->preview($inputs);
        $olderDocument->page = $inputs['page'];
        $olderDocument->format = $format;
        $olderDocument->category_id = $inputs['category_id'];

        return $olderDocument->save();
    }
}
