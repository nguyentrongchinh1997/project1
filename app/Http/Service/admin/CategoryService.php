<?php  

namespace App\Http\Service\admin;

use App\Model\Category;

class CategoryService
{
<<<<<<< HEAD

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
=======
    /*hàm thêm chuyên mục*/
    public function create($inputs)
    {   
        return Category::create([
>>>>>>> 1cd77f90c86cc7063d3c6dd63b6aa3907d0aad3e
            'name' => $inputs['name'],
            'unsigned_name' => str_slug($inputs['name']),
            'type' => $inputs['type'],
        ]);
    }
<<<<<<< HEAD

    /**
     * Sửa chuyên mục
     */    
    public function edit($id, $inputs)
    {
        $category = $this->model->findOrFail($id);
=======
    /*end*/
    
    public function edit($id, $inputs)
    {
        $category = Category::find($id);
>>>>>>> 1cd77f90c86cc7063d3c6dd63b6aa3907d0aad3e
        $category->name = $inputs["name"];
        $category->unsigned_name = str_slug($inputs["name"]);
        $category->type = $inputs["type"];

        return $category->save($inputs);
    }

<<<<<<< HEAD
    /**
     * Xóa chuyên mục
     */
    public function deleteCategory($id)
    {
        $category = $this->model->findOrFail($id);
=======
    public function deleteCategory($id)
    {
        $category = Category::find($id);
>>>>>>> 1cd77f90c86cc7063d3c6dd63b6aa3907d0aad3e

        return $category->delete();
    }

<<<<<<< HEAD
    /**
     * Lấy chuyên mục thoe id
     */
    public function getDataCategory($id)
    {
        $category = $this->model->findOrFail($id);
=======
    public function getDataCategory($id)
    {
        $category = Category::find($id);
>>>>>>> 1cd77f90c86cc7063d3c6dd63b6aa3907d0aad3e

        return $category;
    }

}
