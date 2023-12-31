<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface AuthDaoInterface
{
  public function saveUser(Request $request);
}
