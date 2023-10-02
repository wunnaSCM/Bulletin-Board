<?php

namespace App\Contracts\Dao\User;
use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface UserDaoInterface
{
  public function getAllUser(Request $request);

  public function getUserById($id);

  public function updateUser(Request $request, $id);
}
