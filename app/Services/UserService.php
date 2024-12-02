<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function createUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        $data['role'] = "Customer";
        return User::create($data);
    }

    public function loginUser($credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }
}
