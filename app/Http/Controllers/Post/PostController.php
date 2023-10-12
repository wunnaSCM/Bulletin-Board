<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Exports\PostsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Http\Request;
use App\Imports\PostsImport;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    private $postInterface;

    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postInterface = $postServiceInterface;
    }
    public function index(Request $request)
    {
        $posts = $this->postInterface->getAllPost($request);
        $title = 'Delete Post!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('post.index')->with(compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function createConfirm(StoreRequest $request)
    {
        return view('post.create-confirm')->with(compact('request'));
    }
    public function store(Request $request)
    {
        $this->postInterface->savePost($request);
        toast('Post is successfully created', 'success');
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $post = $this->postInterface->getPostById($id);
        return view('post.edit')->with(compact('post'));
    }

    public function editConfirm(Request $request, $id)
    {
        return view('post.edit-confirm')->with(compact(['request', 'id']));
    }

    public function update(Request $editRequest, $id)
    {
        $this->postInterface->updatePost($editRequest, $id);
        toast('Post is successfully updated', 'success');
        return redirect()->route('post.index')->withInput();
    }

    public function delete($id)
    {
        $this->postInterface->deletePost($id);
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = $this->postInterface->getPostById($id);
        return view('post.detail')->with(compact('post'));
    }

    public function export()
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    public function import(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required',
        ]);
        Excel::import(new PostsImport, $request->file);
        return back()->withStatus('Import in queue, we will send notification after import finished.');
    }

    public function importView()
    {
        return view('post.import');
    }
}
