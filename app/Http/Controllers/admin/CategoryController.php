<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Service\admin\CategoryService;

class CategoryController extends Controller
{
    /*hàm khởi tạo*/
    protected $categoryService;
    public function __construct(CategoryService $category)
    {
        $this->categoryService = $category;
    }
    /*end*/

    /*trả về danh sách chuyên mục*/
    public function getListCategoryForm()
    {
        $data = [
            "listCategory" => $this->categoryService->listAllCategory()
        ];

        return view("admin.pages.category.list", $data);
    }
    /*end*/

    /*trả về form thêm chuyên mục*/
    public function getAddCategoryForm()
    {
        return view("admin.pages.category.add");
    }
    /*end*/

    /*thực hiện thêm chuyên mục*/
    public function postAddCategory(CategoryRequest $request)
    {
        $this->categoryService->create($request->all());

        return redirect("admin/category/add")->with("thongbao", __('add.success'));
    }
    /*end*/

    /*thực hiện chức năng xóa chuyên mục*/
    public function deleteCategory($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect("admin/category/list")->with("thongbao", __('delete.success'));
    }
    /*end*/

    /*trả về form sửa chuyên mục*/
    public function getEditCategory($id)
    {
        return view("admin.pages.category.edit", ["category" => $this->categoryService->getDataCategory($id)]);
    }
    /*end*/

    /*chức năng thêm sửa chuyên mục*/
    public function postEditCategory(CategoryRequest $request, $id)
    {
        $this->categoryService->edit($id, $request->all());

        return redirect("admin/category/edit/$id")->with("thongbao", __('edit.success'));
    }
    /*end*/
}
