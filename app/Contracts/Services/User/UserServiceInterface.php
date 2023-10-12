<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface UserServiceInterface
{
  public function getAllUser(Request $request);

  public function getUserById($id);
  public function updateUser(Request $request, $id);
  public function deletedUserById($id, $deletedUserId);
  public function getPostByUserId(Request $request, $userId);
}
