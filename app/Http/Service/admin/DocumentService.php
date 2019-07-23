<?php

namespace App\Http\Service\admin;

use App\Model\ocument;

class DocumentService
{
    
    public function uploadFileDocument($document, $poster, $name)
    {
        if (!is_null($document) && !is_null($poster)) {
            $nameDocument = $name."-".rand();
            $namePoster = $name."-poster-".rand();
            $document->move("upload/document/file", $nameDocument);
            $poster->move("upload/document/poster", $namePoster);
            $format = $document ->getClientOriginalExtension(); // đuôi file tài liệu
            $result = [
                "format" => $format, 
                "image" => $namePoster, 
                "url_document" => $nameDocument,
            ];
            return $result;

        }
    }
    

    public function create($name, $dicription, $type, $price, $preview, $page, $category_id, $result, $date)
    {
        return Document::create([
            "name" => $name,
            "unsigned_name" => changeTitle($name),
            "dicription" => $dicription,
            "type" => $type,
            "price" => $price,
            "image" => $result["image"],
            "url_document" => $result["url_document"],
            "preview" => $preview,
            "page" => $page,
            "format" => $result["format"],
            "category_id" => $category_id,
            "date" => $date,

        ]);

    }

    public function edit($id, $name, $dicription, $type, $price, $preview, $page, $category_id, $document, $poster)
    {
        $olderDocument = Document::find($id);
        if (!is_null($document)) {
            $nameDocument = changeTitle($name)."-".rand();
            $document->move("upload/document/file", $nameDocument);
            $format = $document ->getClientOriginalExtension(); // đuôi file tài liệu
        } else {
            $nameDocument = $olderDocument->url_document;
            $format = $olderDocument->format;

        }
        if (!is_null($poster)) {
            $nameImage = changeTitle($name)."-poster-".rand();
            $poster->move("upload/document/poster", $nameImage);
            
        } else {
            $nameImage = $olderDocument->image;
        }
        $olderDocument->name = $name;
        $olderDocument->unsigned_name = changeTitle($name);
        $olderDocument->dicription = $dicription;
        $olderDocument->type = $type;
        $olderDocument->price = $price;
        $olderDocument->image = $nameImage;
        $olderDocument->url_document = $nameDocument;
        $olderDocument->preview = $preview;
        $olderDocument->page = $page;
        $olderDocument->format = $format;
        $olderDocument->category_id = $category_id;
        return $olderDocument->save();
       
    }

}
