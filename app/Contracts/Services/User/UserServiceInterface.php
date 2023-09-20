<?php

namespace App\Contracts\Services\User;

/**
 * Interface of Data Access Object for Authentication
 */
interface UserServiceInterface
{
  public function getAllUser();

  public function getUserById($id);
}