<?php  

namespace App\Http\Service\client;

use App\Model\User;
use App\Model\Document;
use App\Model\Category;

class IndexService
{
    protected $documentModel, $categoryModel;

    public function __construct(Document $document, Category $category)
    {
        $this->documentModel = $document;
        $this->categoryModel = $category;
    }

    public function getData()
    {
        $listCategory = $this->categoryModel
                            ->where('type', config('config.category.type.document'))
                            ->with('document')
                            ->take(6)
                            ->get(); // lấy tất cả chuyên mục về tài liệu
        $listDocumentNew = $this->documentModel
                                ->orderBy("date", "DESC")
                                ->take(12)->get(); // tài liệu mới nhất
        $data = [
            'listCategory' => $listCategory,
            'listDocumentNew' => $listDocumentNew,
        ];

        return $data;
    }
}
