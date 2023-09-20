<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;

class UserController extends Controller
{
    private $authInterface, $userInterface;

    public function __construct(AuthServiceInterface $authServiceInterface, UserServiceInterface $userServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
        $this->userInterface = $userServiceInterface;
    }

    public function index()
    {
        $users = $this->userInterface->getAllUser();
        return view('user.index')->with(compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authInterface->saveUser($request);
        return redirect()->route('dashboard')->withInput();;
    }

    public function edit($id)
    {
        $user = $this->userInterface->getUserById($id);
        // dd('user', $user);
        return view('user.edit')->with(compact('user'));
    }
}