<?php  

namespace App\Http\Service\admin;

use App\Model\Post;
use App\Model\Category;

class PostService
{
    public function create($inputs)
    {
        $uploadImage = new PostService();
        return Post::create([
            "title" => $inputs["title"],
            "unsigned_title" => changeTitle($inputs["title"]),
            "content" => $inputs["content"],
            "image" => $uploadImage->uploadImage($inputs["file"], changeTitle($inputs["title"])),
            "date" => date("Y-m-d H:i:s"),
            "category_id" => $inputs["category"],
        ]);

    }


    public function editPost($id, $inputs, $file)
    {

        $uploadImage = new PostService();
        $edit = Post::find($id);
        $edit->title = $inputs["title"];
        $edit->unsigned_title = changeTitle($inputs["title"]);
        $edit->content = $inputs["content"];
        $edit->image = $uploadImage->editUploadImage($edit->image, $file, changeTitle($inputs["title"]));
        $edit->date = date("Y-m-d H:i:s");
        $edit->category_id = $inputs["category"];
        return $edit->save($inputs);

    }

    public function editUploadImage($nameOld, $file, $nameNew)
    {
        if (!is_null($file)) {
            $file->move("upload/post", $nameNew);
            return $nameNew;
        } else {
            return $nameOld;
        }
    }

    public function uploadImage($image, $name)
    {
        if (!is_null($image)) {
            $image->move("upload/post", $name);
            return $name;
        }
    }

    public function listCategory()
    {
        $listCategory = Category::where("type", 0)->get();
        return $listCategory;
        
    }
}
