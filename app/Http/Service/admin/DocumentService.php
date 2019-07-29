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
        $category = $this->categoryModel->where("type", 1)->get();

        return $category;
    }

    public function listDocument()
    {
        $document = $this->documentModel->all();

        return $document;
    }

    public function addDocument($inputs)
    {
        return $this->documentModel->create(
            'name' => $inputs['name'],
            'unsigned_name' => str_slug($inputs['name']),
            'dicription' => $inputs['dicription'],
            'type' => $inputs['type'],
            'price' => $inputs['price'],
            'image' => uploadPoster($inputs['poster'], $inputs['name'], "upload/poster/"),
            'url_document' => uploadDocument($inputs['document'], $inputs['name'], "upload/document/"),
            'preview' => $inputs['preview'],
            'view' => 0,
            'page' => $inputs['page'],
            'format' => formatDocument($inputs['document']),
            'category_id' => $inputs['category_id'],
            'date' => date('Y-m-d H:i:s'),
        )
    }

    public function upload($inputs, $name, $path)
    {
        if (!is_null($inputs)) {
            $nameFile = str_slug($name).'-'.rand();
            $inputs->move($path, $nameFile);

            return $nameFile;
        }
    }

    public function formatDocument($inputs)
    {
        return $inputs->getClientOriginalExtension(); // đuôi file tài liệu
    }

    public function olderDocument($id)
    {
        $olderDocument = $this->documentModel->findOrFail($id);
        
        return $olderDocument;
    }
    
    public function postEditDocument($inputs, $id)
    {
        $olderDocument = $this->documentModel->findOrFail($id);
        if (!is_null($inputs['poster'])) {
            $namePoster = uploadPoster($inputs['poster'], $inputs['name']);
        } else {
            $namePoster = $olderDocument->image;
        }
        if (!is_null($inputs['document'])) {
            $nameDocument = uploadDocument($inputs['document'], $inputs['name']);
            $format = formatDocument($inputs['document']);
        } else {
            $nameDocument = $olderDocument->url_document;
            $format = $olderDocument->format;
        }
        $olderDocument->name = $inputs['name'];
        $olderDocument->unsigned_name = str_slug($inputs['name']);
        $olderDocument->dicription = $inputs['dicription'];
        $olderDocument->type = $inputs['type'];
        $olderDocument->price = $inputs['price'];
        $olderDocument->image = $namePoster;
        $olderDocument->url_document = $nameDocument;
        $olderDocument->preview = $inputs['preview'];
        $olderDocument->page = $inputs['page'];
        $olderDocument->format = $format;
        $olderDocument->category_id = $inputs['category_id'];

        return $olderDocument->save();
    }
}
