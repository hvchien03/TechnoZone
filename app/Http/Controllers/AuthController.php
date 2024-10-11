<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResgisterRequest;
use App\Services\UserService;

class AuthController extends Controller
{
    protected $UserService;
    public function __construct(UserService $_UserService)
    {
        $this->UserService = $_UserService;
    }
    public function index()
    {
        return view('auth.index');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        if (request()->isMethod('get')) {
            return view('auth.register');
        }
        $request = app(ResgisterRequest::class);
        $data = $request->validated();
        $user = $this->UserService->createUser($data);
        return redirect()->route('login')->with('success', 'Register successfully!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
