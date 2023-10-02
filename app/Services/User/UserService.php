<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{
  private $userDao;

  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  public function getAllUser(Request $request)
  {
    $user = $this->userDao->getAllUser($request);
    return $user;
  }

  public function getUserById($id)
  {
    $user = $this->userDao->getUserById($id);
    return $user;
  }

  public function updateUser(Request $request, $id)
  {
    $user = $this->userDao->updateUser($request, $id);
    return $user;
  }
}