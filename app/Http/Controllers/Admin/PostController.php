<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
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
        $posts = Post::all();
        return view('admin.posts.list', ['posts' => $posts]);
    }
    public function getAdd()
    {
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.posts.add', ['category' => $category, 'tag' => $tag]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:50',
            'image' => 'required',
            'pos_hot' => 'required', 
            'pos_status' => 'required',          
        ],
        [
            'title.required' => 'Chưa nhập tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn, tối thiểu 5 kí tự',
            'content.required' => 'Chưa nhập nội dung',
            'content.min' => 'Nội dung phải lớn hơn 50 kí tự',
            'image.required' => 'Chưa có ảnh',
            'pos_hot.required' => 'Chọn tin nổi bật',
            'pos_status.required' => 'Chọn trạng thái',
        ]);

        Post::insert([
            'pos_title' => $request->title,
            'pos_slug' => slug($request->title),
            'pos_description' => $request->description,
            'pos_content' => $request->content,
            'pos_image' => $request->image,
            'pos_hot' => $request->pos_hot,
            'pos_status' => $request->pos_status,
            'pos_cat_id' => $request->category,
            'pos_admin_id' => 1,
            'pos_created_at' => date('Y-m-d H:i:s'),
        ]);
    }
    public function getEdit($id)
    {
        $post = Post::where('pos_id', $id)->first();
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.posts.edit', ['post' => $post, 'category' => $category, 'tag' => $tag]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:50',
            'image' => 'required',
            'pos_hot' => 'required', 
            'pos_status' => 'required',          
        ],
        [
            'title.required' => 'Chưa nhập tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn, tối thiểu 5 kí tự',
            'content.required' => 'Chưa nhập nội dung',
            'content.min' => 'Nội dung phải lớn hơn 50 kí tự',
            'image.required' => 'Chưa có ảnh',
            'pos_hot.required' => 'Chọn tin nổi bật',
            'pos_status.required' => 'Chọn trạng thái',
        ]);

        Post::insert([
            'pos_title' => $request->title,
            'pos_slug' => slug($request->title),
            'pos_description' => $request->description,
            'pos_content' => $request->content,
            'pos_image' => $request->image,
            'pos_hot' => $request->pos_hot,
            'pos_status' => $request->pos_status,
            'pos_cat_id' => $request->category,
            'pos_admin_id' => 1,
            'pos_updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
    public function getDelete($id)
    {
        Post::where('pos_id', $id)->first()->delete();
        return redirect('admin/posts/list')->with('thongbao', 'Xóa thành công');
    }
}
