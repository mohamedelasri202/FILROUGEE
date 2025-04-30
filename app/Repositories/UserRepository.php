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

    public function updatesatatus($id, $status)
    {
        $user = User::find($id);
        $user->status->update($status);
        $user->save();
        return $user;
    }
    public function editeprofile($id, $request)
    {

        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,

        ]);


        $user->update([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],

        ]);


        return $user;
    }
}
