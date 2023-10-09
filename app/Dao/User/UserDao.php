<?php

namespace App\Dao\User;

use App\Models\User;
use App\Contracts\Dao\User\UserDaoInterface;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
  public function getAllUser(Request $request)
  {
    $userQuery = User::query();
    if ($request->name || $request->email) {
      $userQuery->where('name', 'like', "%{$request->name}%")
        ->where('email', 'like', "%{$request->email}%");
    }

    if ($request->start && $request->end) {
      $userQuery->when(
        $request->start && $request->end,
        function (Builder $builder) use ($request) {
          $builder->whereBetween(
            DB::raw('DATE(created_at)'),
            [
              $request->start,
              $request->end
            ]
          );
        }
      );
    }

    $users = $userQuery->paginate(5);
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
    $user->profile = $request->profile;
    $user->update();
    return $user;
  }

  public function deletedUserById($id, $deletedUserId)
  {
    $user = User::find($id);

    if ($user) {
      $user->deleted_user_id = $deletedUserId;
      $user->save();
      return $user->delete();
    }
  }

  public function getPostByUserId($userId)
  {
    $user = User::findOrFail($userId);
    return $user;
  }
}
