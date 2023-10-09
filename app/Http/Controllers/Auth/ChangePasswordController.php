<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    private $userInterface;

    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userInterface = $userServiceInterface;
    }
    public function changePassword($id)
    {
        return view('auth.change-password')->with(compact('id'));
    }

    public function updateChangePwd(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        $user = $this->userInterface->getUserById($id);
        $user->password = Hash::make($request->new_password);
        $user->update();

        return back()->with("status", "Password changed successfully!");
    }
}
