<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
  private $userDao;

  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  public function getAllUser()
  {
    $user = $this->userDao->getAllUser();
    return $user;
  }

  public function getUserById($id)
  {
    $user = $this->userDao->getUserById($id);
    return $user;
  }
}