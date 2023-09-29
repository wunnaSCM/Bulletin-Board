<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface UserServiceInterface
{
  public function getAllUser();

  public function getUserById($id);
  public function updateUser(Request $request, $id);
}