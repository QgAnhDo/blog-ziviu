<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;

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

    public function getAdd()
    {
        $category =Category::where('cat_parent_id', 0)->where('cat_active', 1)->get();
        return view('admin.categories.add', ['category' => $category]);
    }
    public function postAdd(Request $request)
    {

        $this->validate($request, [
            'cat_name' => 'required|min:5',
            'cat_parent_id' => 'required',
            'cat_hot' => 'required',
        ], [
            'cat_name.required' => 'Chưa nhập tên danh mục',
            'cat_name.min' => 'Tên danh mục cần tối thiểu 5 kí tự',
            'cat_parent_id.required' => 'Hãy chọn danh mục',
            'cat_hot.required' => 'Xác nhận danh mục hot',
        ]);
        Category::insert([
            'cat_name' => $request->cat_name,
            'cat_slug' => Str::slug($request->cat_name),
            'cat_description' => $request->cat_description,
            'cat_parent_id' => $request->cat_parent_id,
            'cat_hot' => $request->cat_hot,
            'cat_active' => $request->cat_active,
        ]);

        return redirect('admin/categories')->with('thongbao', 'Thêm danh mục thành công');
    }

    public function getEdit($id)
    {
        $category = Category::where('cat_id', $id)->first();
        $categories =Category::where('cat_parent_id', 0)->where('cat_active', 1)->get();

        return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'cat_name' => 'required|min:5',
            'cat_parent_id' => 'required',
            'cat_hot' => 'required',
        ], [
            'cat_name.required' => 'Chưa nhập tên danh mục',
            'cat_name.min' => 'Tên danh mục cần tối thiểu 5 kí tự',
            'cat_parent_id.required' => 'Hãy chọn danh mục',
            'cat_hot.required' => 'Xác nhận danh mục hot',
        ]);
        Category::where('cat_id', $id)->update([
            'cat_name' => $request->cat_name,
            'cat_slug' => Str::slug($request->cat_name),
            'cat_description' => $request->cat_description,
            'cat_parent_id' => $request->cat_parent_id,
            'cat_hot' => $request->cat_hot,
            'cat_active' => $request->cat_active,
        ]);
        return redirect('admin/categories')->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id)
    {
        Category::where('cat_id', $id)->delete();
        return redirect('admin/categories')->with('thongbao', 'Xóa thành công');
    }
}
