<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        if( User::attempt(['email' => $email, 'password' =>$password])) {
            if(Auth::check()){
	            $user = Auth::user();
	            if ($user->quyen == 1) {
	                return redirect('admin');
	            }
	            else return redirect('/');
	        }
	        else return redirect('dangnhap');
        } 
        else {                
            return redirect('dangnhap')->with('thongbao','Đăng nhập ko thành công!');
        }
    }
}