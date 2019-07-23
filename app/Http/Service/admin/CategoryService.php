<?php  

namespace App\Http\Service\admin;

use App\Model\Category;

class CategoryService
{
    /*hàm thêm chuyên mục*/
    public function create($inputs)
    {   
        return Category::create([
            'name' => $inputs['name'],
            'unsigned_name' => str_slug($inputs['name']),
            'type' => $inputs['type'],
        ]);
    }
    /*end*/
    
    public function edit($id, $inputs)
    {
        $category = Category::find($id);
        $category->name = $inputs["name"];
        $category->unsigned_name = str_slug($inputs["name"]);
        $category->type = $inputs["type"];

        return $category->save($inputs);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        return $category->delete();
    }

    public function getDataCategory($id)
    {
        $category = Category::find($id);

        return $category;
    }

}
