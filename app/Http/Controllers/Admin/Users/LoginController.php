<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ],
            [
                'email.required' => 'Bạn chưa nhập Email',
                'password.required' => ' Bạn chưa nhập mật khẩu'
            ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        $request->session()->flash('error', 'Email or Password vừa nhập không đúng');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return view('admin.users.login', [
            'title' => ' ',
        ]);
    }
}
