<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;

class UserController extends Controller
{
    private $authInterface;

    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    public function index()
    {
        return view('user.index');
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
}