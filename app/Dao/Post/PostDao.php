<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostDao implements PostDaoInterface
{
  public function getAllPost(Request $request)
  {
    $posts = Post::query()
      ->when($request->search, function (Builder $builder) use ($request) {
        $builder->where('title', 'like', "%{$request->search}%");
      })
      ->paginate(5);

    return $posts;
  }

  public function savePost(Request $request)
  {
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->status = 1;
    $post->created_user_id = auth()->user()->id;
    $post->updated_user_id = auth()->user()->id;
    $post->save();
    return $post;
  }

  public function getPostById($id)
  {
    $post = Post::find($id);
    return $post;
  }

  public function updatePost(Request $request, $id)
  {
    $post = Post::find($id);
    $post->title = $request->title;
    $post->description = $request->description;
    $post->status = $request->status ? 0 : 1;
    $post->created_user_id = auth()->user()->id;
    $post->updated_user_id = auth()->user()->id;
    $post->update();
    return $post;
  }

  public function deletePost($id)
  {
    $post = Post::find($id);
    return $post->delete();
  }

  public function getAllPostExport()
  {
    $posts = Post::all();
    return $posts;
  }
}
