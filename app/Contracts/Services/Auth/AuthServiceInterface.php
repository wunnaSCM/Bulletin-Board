<?php

namespace App\Contracts\Services\Auth;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Authentication
 */
interface AuthServiceInterface
{
  public function saveUser(Request $request);
}