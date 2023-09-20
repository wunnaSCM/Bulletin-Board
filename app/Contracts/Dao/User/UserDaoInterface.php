<?php

namespace App\Contracts\Dao\User;

/**
 * Interface of Data Access Object for Authentication
 */
interface UserDaoInterface
{
  public function getAllUser();

  public function getUserById($id);
}
