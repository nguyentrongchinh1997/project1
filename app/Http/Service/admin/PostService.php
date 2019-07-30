<?php  

namespace App\Http\Service\admin;

use App\Model\Post;
use App\Model\Category;

class PostService
{
    protected $post, $category;

    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function deletePost($id)
    {
        $deletePost = $this->post->findOrFail($id);

        return $deletePost->delete();
    }

    public function listPost()
    {
        return $this->post->all();
    }

    public function create($inputs)
    {
        return $this->post->create([
            'title' => $inputs['title'],
            'unsigned_title' => str_slug($inputs['title']),
            'content' => $inputs['content'],
            'image' => $this->uploadImage($inputs['file'], str_slug($inputs['title'])),
            'date' => date('Y-m-d H:i:s'),
            'category_id' => $inputs['category'],
        ]);
    }

    public function uploadImage($image, $name)
    {
        if (!is_null($image)) {
            $nameImage = $name . '-' . rand();
            $image->move('upload/post', $nameImage);

            return $nameImage;
        }
    }

    public function olderPost($id)
    {
        return $this->post->findOrFail($id);
    }

    public function editPost($inputs, $id)
    {
        $edit = $this->post->findOrFail($id);
        $edit->title = $inputs['title'];
        $edit->unsigned_title = changeTitle($inputs['title']);
        $edit->content = $inputs['content'];
        $edit->image = $this->editUploadImage($edit->image, $inputs['file'], str_slug($inputs['title']));
        $edit->date = date('Y-m-d H:i:s');
        $edit->category_id = $inputs['category'];

        return $edit->save($inputs);
    }

    public function editUploadImage($oldName, $file, $newName)
    {
        if (is_null($file)) {
            return $oldName;
        } else {
            $file->move('upload/post', $newName);

            return $newName;
        }
    }

    public function listCategory()
    {
        $listCategory = $this->category->where('type', config('config.category.type.post'))->get();

        return $listCategory;
    }
}
