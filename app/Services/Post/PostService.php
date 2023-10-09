<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use Illuminate\Http\Request;

class PostService implements PostServiceInterface
{
  private $postDao;

  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  public function getAllPost(Request $request)
  {
    $posts = $this->postDao->getAllPost($request);
    return $posts;
  }

  public function savePost(Request $request)
  {
    $posts = $this->postDao->savePost($request);
    return $posts;
  }

  public function getPostById($id)
  {
    $post = $this->postDao->getPostById($id);
    return $post;
  }

  public function updatePost(Request $request, $id)
  {
    $post = $this->postDao->updatePost($request, $id);
    return $post;
  }

  public function deletePost($id, $deletedUserId)
  {
    $post = $this->postDao->deletePost($id, $deletedUserId);
    return $post;
  }
}
