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
            'unsigned_name' => changeTitle($inputs['name']),
            'type' => $inputs['type'],
        ]);
    }
    /*end*/
    
    public function edit($id, $inputs)
    {
        $category = Category::find($id);
        $category->name = $inputs["name"];
        $category->unsigned_name = changeTitle($inputs["name"]);
        $category->type = $inputs["type"];
        return $category->save($inputs);
       
    }

}
