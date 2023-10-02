<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
        return view('user.index')->with(compact('users'));
    }

    public function show($id)
    {
        $user = $this->userInterface->getUserById($id);
            // dd('user', $user->profile);
        return view('user.detail')->with(compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function createConfirm(StoreRequest $request)
    {
        $imageName = $request->profile ? uniqid() . "_" . $request->profile->getClientOriginalName() : null;
        $imageSource = $request->profile->move(public_path("images/user_image/"), $imageName);
        $removeString = '/Users/wunna/Documents/Laravel/bulletin-board/public/images/user_image/';
        $imagePath = Str::replace($removeString,'',$imageSource);
        session(['image' => $imagePath]);
        return view('user.create-confirm')->with(compact(['request', 'imagePath']));
    }

    public function store(Request $request)
    {
        $this->authInterface->saveUser($request);
        return redirect()->route('dashboard')->withInput();;
    }

    public function edit($id)
    {
        $user = $this->userInterface->getUserById($id);
        return view('user.edit')->with(compact('user'));
    }

    public function editConfirm(EditRequest $request, $id)
    {
        // dd($request);
        if ($request->profile) {
            $imageName = $request->profile ? uniqid() . "_" . $request->profile->getClientOriginalName() : null;
            $imageSource = $request->profile->move(public_path("images/user_image/"), $imageName);
            $removeString = '/Users/wunna/Documents/Laravel/bulletin-board/public/images/user_image/';
            $imagePath = Str::replace($removeString,'',$imageSource);
            session(['image1' => $imagePath]);
            return view('user.edit-confirm')->with(compact(['request', 'id', 'imagePath']));
        } else {
            return view('user.edit-confirm')->with(compact(['request', 'id']));
        }
    }

    public function update(Request $request, $id)
    {
        $this->userInterface->updateUser($request, $id);
        return redirect()->route('user.index')->withInput();
    }
}
