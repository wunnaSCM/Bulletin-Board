<?php

namespace App\Contracts\Dao\Post;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface PostDaoInterface
{
  public function getAllPost(Request $requeset);

  public function savePost(Request $request);

  public function getPostById($id);

  public function updatePost(Request $request, $id);

  public function deletePost($id);

  public function getAllPostExport(Request $request);
}
