<?php

namespace App\Dao\User;

use App\Models\Post;
use App\Models\User;
use App\Contracts\Dao\User\UserDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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

    $users = $userQuery->paginate($perPage = $request->perPage ? $request->perPage : 5, $columns = ['*'], $pageName = 'users');
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
    $posts = Post::query()->where('created_user_id', '=', $id);

    if ($user) {
      $user->deleted_user_id = $deletedUserId;
      $posts->delete();
      return $user->delete();
    }
  }

  public function getPostByUserId(Request $request, $userId)
  {
    $posts = Post::query()
      ->when($request->search, function (Builder $builder) use ($request) {
        $builder->where('title', 'like', "%{$request->search}%");
      })
      ->where('status', '=', 1)
      ->where('created_user_id', '=', $userId)
      ->paginate($perPage = $request->perPage ? $request->perPage : 6, $columns = ['*'], $pageName = 'posts');;
    return $posts;
  }
}
