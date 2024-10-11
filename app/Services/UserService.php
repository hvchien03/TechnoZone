<?php
namespace App\Services;
use App\Models\User;
class UserService
{
    public function createUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['role'] = "Customer";
        return User::create($data);
    }
}