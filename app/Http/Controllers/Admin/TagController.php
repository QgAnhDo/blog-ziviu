<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('admin.tags.list', ['tags' => $tags]);
    }

    public function getAdd() {
        return view('admin.tags.add');
    }
    public function postAdd(Request $request) {
        $this->validate($request, [
            'tag_name' => 'required|min:5',
        ],[
            'tag_name.required' => 'Chưa nhập tiêu đề',
            'tag_name.min' => 'Tiêu đề quá ngắn, tối thiểu 5 kí tự',
        ]);

        Tag::insert([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name),
            'tag_description' => $request->tag_description,
            'tag_active' => $request->tag_active,
        ]);

        return redirect('admin/tags')->with('thongbao', 'Thêm tag thành công');
    }

    public function getEdit($id)
    {
        $tags = Tag::where('tag_id', $id)->first();
        return view('admin.tags.edit', ['tags' => $tags]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'tag_name' => 'required|min:5',
        ], [
            'tag_name.required' => 'Chưa nhập tiêu đề',
            'tag_name.min' => 'Tiêu đề quá ngắn, tối thiểu 5 kí tự',
        ]);

        Tag::where('tag_id', $id)->update([
            'tag_name' => $request->tag_name,
            'tag_slug' => Str::slug($request->tag_name),
            'tag_description' => $request->tag_description,
            'tag_active' => $request->tag_active,
        ]);
        return redirect()->back()->with('thongbao', 'Sửa tag thành công');
    }

    public function getDelete($id)
    {
        Tag::where('tag_id', $id)->delete();
        return redirect('admin/tags')->with('thongbao', 'Xóa thành công');
    }
}
