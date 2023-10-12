<?php

namespace App\Contracts\Services\Post;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface PostServiceInterface
{
  public function getAllPost(Request $request);

  public function savePost(Request $request);
  public function getPostById($id);
  public function updatePost(Request $request, $id);
  public function deletePost($id);
}
