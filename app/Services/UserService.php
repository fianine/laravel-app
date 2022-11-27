<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserService
{
    /**
     * @return User
     */
    public function getUsers()
    {
        return User::paginate(10);
    }

    /**
     * @param $userId
     * @return User
     */
    public function getUser($userId)
    {
        return User::find($userId);
    }
}
