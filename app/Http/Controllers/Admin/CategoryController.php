<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getList()
    {
        $category = Category::orderBy('cat_id', 'desc')->get();
        return view('admin.categories.list', ['category' => $category]);
    }
    public function getEdit($id)
    {
        $category = Category::where('cat_id', $id)->first();
        return view('admin.categories.edit', ['category' => $category]);
    }
}
