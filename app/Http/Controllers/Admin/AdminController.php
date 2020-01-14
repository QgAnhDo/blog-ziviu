<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.index');
    }
    public function getList()
    {
        $admin = Admin::all();
        return view('admin.acc_admin.list', ['admin' => $admin]);
    }
    public function getEdit()
    {
        return view('admin.acc_admin.edit');
    }
}
