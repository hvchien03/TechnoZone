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
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $user = Auth::user(); // Lấy thông tin người dùng
           // Kiểm tra vai trò
           if ($user->role === 'admin') {
            return 'admin'; // Trả về vai trò admin
            } 
            elseif ($user->role === 'user') 
            {
                return 'user'; // Trả về vai trò user
            } 
            else 
            {
                throw new \Exception('Vai trò không hợp lệ.');
            }
        }
    }
}
