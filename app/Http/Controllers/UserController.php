<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return UserResource::collection(
            $this->userService->getUsers()
        );
    }

    public function show(Request $request)
    {
        return new UserResource(
            $this->userService->getUser($request->userId)
        );
    }
}
