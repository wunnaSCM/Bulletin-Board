<?php 

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use Illuminate\Foundation\Auth\User;

class UserDao implements UserDaoInterface
{
  public function getAllUser()
  {
    $users = User::latest()->paginate(20);
    return $users;
  }

  public function getUserById($id)
  {
    $user = User::find($id);
    return $user;
  }
}