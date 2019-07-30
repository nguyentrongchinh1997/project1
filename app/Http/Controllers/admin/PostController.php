<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Service\admin\PostService;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostService $post){
        $this->post = $post;
    }
    
    public function getListPost()
    {
        $data = [
            'listPost' => $this->post->listPost(),
        ];

        return view('admin.pages.post.list', $data);
    }

    public function getAddPost()
    {
        $data = [
            'listCategory' => $this->post->listCategory(),
        ];

        return view('admin.pages.post.add', $data);
    }

    public function deletePost($id)
    {
        $this->post->deletePost($id);

        return redirect('admin/post/list')->with('thongbao', __('delete.success'));
    }

    public function getEditPost(PostRequest $request, $id)
    {
        $data = [
            'post' => $this->post->olderPost($id),
            'listCategory' => $this->post->listCategory(),
        ];

        return view('admin.pages.post.edit', $data);
    }

    public function postEditPost(PostRequest $request, $id)
    {   
        $this->post->editPost($request->all(), $id);

        return redirect('admin/post/edit/$id')->with('thongbao', __('edit.success'));
    }

    public function postAddPost(PostRequest $request)
    {
        $this->post->create($request->all());

        return redirect('admin/post/add')->with('thongbao', __('add.success'));
    }
}
