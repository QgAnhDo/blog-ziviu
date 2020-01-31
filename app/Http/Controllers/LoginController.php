<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if( User::attempt(['use_email' => $email, 'use_password' =>$password])) {
            return redirect('/');
        }
        else {
            return redirect('dangnhap')->with('thongbao','Đăng nhập ko thành công!');
        }
    }
}
