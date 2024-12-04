<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $_userService)
    {
        $this->userService = $_userService;
    }

    public function index(){
        return view('auth.index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }
    
        // Lấy thông tin đăng nhập từ request
        $credentials = $request->only('email', 'password');
    
        try {
            // Thử đăng nhập
            $role = $this->userService->loginUser($credentials);
    
            // Chuyển hướng dựa trên vai trò
            if ($role === 'admin') {
                return redirect()->route('admin.home')->with('success', 'Đăng nhập thành công!');
            } elseif ($role === 'user') {
                return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
            }
        } catch (\Exception $e) {
            // Xử lý lỗi từ loginUser
            return redirect()->back()->withInput()->withErrors([
                'login_error' => $e->getMessage(),
            ]);
        }
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        $request->validate(
            [
                'name' => [
                    'required',
                    'regex:/^[\pL\s]+$/u'
                ],
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
                'phone' => 'required|numeric|digits:10',
                'address' => 'required'
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.regex' => 'Tên không hợp lệ',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'password_confirmation.required' => 'Mật khẩu xác nhận không được để trống',
                'password_confirmation.same' => 'Mật khẩu xác nhận không khớp',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.numeric' => 'Số điện thoại không hợp lệ',
                'phone.digits' => 'Số điện thoại phải có 10 số',
                'address.required' => 'Địa chỉ không được để trống'
            ]
        );



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'user'
        ]);
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}