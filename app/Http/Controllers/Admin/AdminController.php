<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.users.list');
    }
    public function getEdit()
    {
        return view('admin.users.edit');
    }
}
