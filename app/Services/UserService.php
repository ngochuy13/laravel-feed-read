<?php

namespace App\Services;

use App\User;

class UserService
{

    /**
     * Create Customer
     * @param array $params
     * @return boolean
     */
    public function createUser(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user = User::where('email', '=', $data['email'])->first();
        $user->roles()->attach($data['role']);
    }

    public function updateUser(array $data)
    {
        $user = User::where('email', $data['email'])
            ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]
            );
        $user = User::where('email', '=', $data['email'])->first();
        $user->roles()->sync($data['role']);
    }

    static public function getAllUser()
    {
        $users = User::all();
        return $users;

    }
}
