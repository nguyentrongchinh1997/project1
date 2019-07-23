<?php  

namespace App\Http\Service\admin;

use App\Model\Category;

class CategoryService
{

    /**
     * Hàm khởi tạo
     */
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Thêm chuyên mục
     */
    public function create($inputs)
    {   
        return $this->model->create([
            'name' => $inputs['name'],
            'unsigned_name' => str_slug($inputs['name']),
            'type' => $inputs['type'],
        ]);
    }

    /**
     * Sửa chuyên mục
     */    
    public function edit($id, $inputs)
    {
        $category = $this->model->findOrFail($id);
        $category->name = $inputs["name"];
        $category->unsigned_name = str_slug($inputs["name"]);
        $category->type = $inputs["type"];

        return $category->save($inputs);
    }

    /**
     * Xóa chuyên mục
     */
    public function deleteCategory($id)
    {
        $category = $this->model->findOrFail($id);

        return $category->delete();
    }

    /**
     * Lấy chuyên mục thoe id
     */
    public function getDataCategory($id)
    {
        $category = $this->model->findOrFail($id);

        return $category;
    }

}
