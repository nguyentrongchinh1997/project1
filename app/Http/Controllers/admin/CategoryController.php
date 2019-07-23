<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Service\admin\CategoryService;

class CategoryController extends Controller
{
    /**
     * Hàm khởi tạo
     */
    protected $categoryService;

    public function __construct(CategoryService $category)
    {
        $this->categoryService = $category;
    }

    /**
     * Trả về danh sách chuyên mục
     */
    public function getListCategoryForm()
    {
        $data = [
            "listCategory" => $this->categoryService->listAllCategory()
        ];

        return view("admin.pages.category.list", $data);
    }

    /**
     * Trả về form thêm chuyên mục
     */
    public function getAddCategoryForm()
    {
        return view("admin.pages.category.add");
    }

    /**
     * Trỏ đến  hàm create bên CategoryService
     * Thực thiện thêm chuyên mục
     */
    public function postAddCategory(CategoryRequest $request)
    {
        $this->categoryService->create($request->all());

        return redirect("admin/category/add")->with("thongbao", __('add.success'));
    }

    /**
     * Trỏ đến  hàm deleteCategory bên CategoryService
     * Thực hiện xóa chuyên mục
     */
    public function deleteCategory($id)
    {
        $this->categoryService->deleteCategory($id);

        return redirect("admin/category/list")->with("thongbao", __('delete.success'));
    }

    /**
     * Trả về form sửa chuyên mục
     */
    public function getEditCategory($id)
    {
        return view("admin.pages.category.edit", ["category" => $this->categoryService->getDataCategory($id)]);
    }

    /**
     * Trỏ đến  hàm edit bên CategoryService
     * Thực hiện sửa chuyên mục 
     */
    public function postEditCategory(CategoryRequest $request, $id)
    {
        $this->categoryService->edit($id, $request->all());

        return redirect("admin/category/edit/$id")->with("thongbao", __('edit.success'));
    }
}
