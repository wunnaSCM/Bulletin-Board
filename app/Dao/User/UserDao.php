<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

  public function updateUser(Request $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->email  = $request->email;
    $user->type  = $request->type;
    $user->phone  = $request->phone;
    $user->address  = $request->address;
    $user->dob = $request->dob;
    $user->created_user_id  = Auth::user()->id ?? 1;
    $user->updated_user_id = Auth::user()->id ?? 1;

    if ($request->profile) {
      $image = request('profile');
      $imageName = uniqid() . "_" . $image->getClientOriginalName();
      $image->move(public_path("images/user_image/"), $imageName);
      $user->profile = $imageName;
    }

    $user->update();
    return $user;
  }
}
