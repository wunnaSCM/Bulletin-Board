<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthDao implements AuthDaoInterface
{
  public function saveUser(Request $request)
  {
    $user = new User();
    $user->name = $request->name;
    $user->email  = $request->email;
    $user->password  = Hash::make($request->password);
    $user->profile = $request->profile ? $request->profile : null;
    $user->type  = $request->type ? $request->type : 1;
    $user->phone  = $request->phone;
    $user->address  = $request->address;
    $user->dob = $request->dob ? $request->dob : null;
    $user->created_user_id  = Auth::user()->id ?? 1;
    $user->updated_user_id = Auth::user()->id ?? 1;
    $user->save();
    return $user;
  }
}
