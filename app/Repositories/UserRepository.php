<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function register($request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role = $request['role'];
        $user->save();
        return $user;
    }


    public function login($request) {}
}
