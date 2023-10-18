<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $authInterface, $userInterface;

    public function __construct(AuthServiceInterface $authServiceInterface, UserServiceInterface $userServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
        $this->userInterface = $userServiceInterface;
    }

    public function index(Request $request)
    {
        $users = $this->userInterface->getAllUser($request);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('user.index')->with(compact('users'));
    }

    public function show($id)
    {
        if (Auth::user()->id == $id || Auth::user()->type === '1') {
            $user = $this->userInterface->getUserById($id);
            return view('user.detail')->with(compact('user'));
        }
    }
    public function create()
    {
        return view('user.create');
    }

    public function createConfirm(StoreRequest $request)
    {
        $profileName = $this->storeProfileImage($request);
        return view('user.create-confirm')->with(compact(['request', 'profileName']));
    }

    public function store(Request $request)
    {
        $this->authInterface->saveUser($request);
        toast('User is successfully created', 'success');
        return redirect()->route('user.index')->withInput();;
    }

    public function edit($id)
    {
        if (Auth::user()->id == $id || Auth::user()->type === '1') {
            $user = $this->userInterface->getUserById($id);
            return view('user.edit')->with(compact('user'));
        }
    }

    public function editConfirm(EditRequest $request, $id)
    {
        if (Auth::user()->id == $id || Auth::user()->type === '1') {

            $editUser = $this->userInterface->getUserById($id);
            $profileName = "";
            if ($request->hasFile('profile')) {
                $profileName = $this->storeProfileImage($request);
                $this->deleteFromStorage($editUser->profile);
            } else {
                $profileName = $editUser->profile;
            }
            return view('user.edit-confirm')->with(compact(['request', 'id', 'profileName']));
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->id == $id || Auth::user()->type === '1') {
            $this->userInterface->updateUser($request, $id);
            toast('User is successfully updated', 'success');
            return redirect()->route('user.index')->withInput();
        }
    }

    public function delete($userId)
    {
        $deletedUserId = Auth::user()->id;
        $this->userInterface->deletedUserById($userId, $deletedUserId);
        return redirect()->route('user.index');
    }

    public function getPostByUserId(Request $request, $userid)
    {
        $posts = $this->userInterface->getPostByUserId($request, $userid);
        $title = 'Delete Post!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('user.posts')->with(compact('posts'));
    }

    function storeProfileImage(Request $request)
    {
        $imageName = time() . '.' . $request->profile->extension();
        // $request->profile->move(storage_path('app/public/user_image/'),$imageName);
        $request->profile->storeAs('/user_image/', $imageName);
        return $imageName;
    }

    function deleteFromStorage($imageName)
    {
        if (Storage::exists('/public/user_image/' . $imageName)) {
            Storage::delete('/public/user_image/' . $imageName);
        }
    }
}
