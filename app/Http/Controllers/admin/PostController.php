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

        return redirect()->route('post.list')->with('thongbao', __('message.delete.success'));
    }

    public function getEditPost($id)
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

        return redirect()->route('post.edit', ['id' => $id])->with('thongbao', __('message.edit.success'));
    }

    public function postAddPost(PostRequest $request)
    {
        $this->post->create($request->all());

        return redirect()->route('post.add')->with('thongbao', __('message.add.success'));
    }
}
