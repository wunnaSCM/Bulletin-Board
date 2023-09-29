<?php

namespace App\Http\Controllers\User;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
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

    public function index()
    {
        $users = $this->userInterface->getAllUser();
        return view('user.index')->with(compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function createConfirm(StoreRequest $request)
    {
        $imageName = $request->profile ? uniqid() . "_" . $request->profile->getClientOriginalName() : null;
        $imageSource = $request->profile->move(public_path("images/tmp/"), $imageName);
        $removeString = '/Users/wunna/Documents/Laravel/bulletin-board/public/images/tmp/';
        $imagePath = Str::replace($removeString,'',$imageSource);
        return view('user.create-confirm')->with(compact(['request', 'imagePath']));
    }

    public function store(Request $request)
    {
        dd('data', $request);
        $this->authInterface->saveUser($request);
        return redirect()->route('dashboard')->withInput();;
    }

    public function edit($id)
    {
        $user = $this->userInterface->getUserById($id);
        return view('user.edit')->with(compact('user'));
    }

    public function editConfirm(Request $request, $id)
    {
        // dd($request->profile);
        return view('user.edit-confirm')->with(compact(['request','id']));
    }

    public function update(Request $request, $id)
    {
        // dd('updated', $request);
        $this->userInterface->updateUser($request, $id);
        return redirect()->route('user.index')->withInput();
    }
}
