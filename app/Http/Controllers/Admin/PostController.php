<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Support\Str;

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
        $posts = Posts::select('pos_id', 'pos_title', 'pos_description', 'pos_image', 'pos_hot', 'pos_status', 'pos_website', 'pos_view', 'pos_created_at', 'pos_updated_at')
            ->get();
        return view('admin.posts.list', ['posts' => $posts]);
    }
    public function getAdd()
    {
        $category = Category::where('cat_active', 1)->select('cat_id', 'cat_name')->get();
        return view('admin.posts.add', ['category' => $category]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'pos_content' => 'required|min:50',
            'pos_image' => 'required',
            'pos_hot' => 'required',
            'pos_status' => 'required',
        ],
        [
            'title.required' => 'Chưa nhập tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn, tối thiểu 5 kí tự',
            'pos_content.required' => 'Chưa nhập nội dung',
            'pos_content.min' => 'Nội dung phải lớn hơn 50 kí tự',
            'pos_image.required' => 'Chưa có ảnh',
            'pos_hot.required' => 'Chọn tin nổi bật',
            'pos_status.required' => 'Chọn trạng thái',
        ]);

        if($request->hasFile('pos_image')){
            $file = $request->file('pos_image');
            $extends = $file->getClientOriginalExtension();

            if ($extends != 'jpg' && $extends != 'png' && $extends != 'jpeg') {
                return redirect()->back()->with('thongbao', 'Chỉ được nhập các file hình ảnh có đuôi JPG, PNG và JPEG!');
            }

            $name = $file->getClientOriginalName();
            $image = Str::random(5)."_".$name;
            while (file_exists("storage/uploads/post/".$image)) {
                $image = Str::random(5)."_".$name;
            }
            $file->move("storage/uploads/post/",$image);
            Posts::insert([
                'pos_title' => $request->title,
                'pos_slug' => Str::slug($request->title),
                'pos_description' => $request->description,
                'pos_content' => $request->pos_content,
                'pos_image' => $image,
                'pos_hot' => $request->pos_hot,
                'pos_status' => $request->pos_status,
                'pos_cat_id' => $request->category,
                'pos_admin_id' => 1,
                'pos_website' => $request->pos_website,
                'pos_created_at' => time(),
            ]);
        }
        return redirect('admin/posts')->with('thongbao', 'Thêm bài viết thành công');
    }
    public function getEdit($id)
    {
        $post = Posts::where('pos_id', $id)->first();
        $category = Category::where('cat_active', 1)->select('cat_id', 'cat_name')->get();
        return view('admin.posts.edit', ['post' => $post, 'category' => $category]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'pos_content' => 'required|min:50',
            'pos_image' => 'required',
            'pos_hot' => 'required',
            'pos_status' => 'required',
        ],
        [
            'title.required' => 'Chưa nhập tiêu đề',
            'title.min' => 'Tiêu đề quá ngắn, tối thiểu 5 kí tự',
            'pos_content.required' => 'Chưa nhập nội dung',
            'pos_content.min' => 'Nội dung phải lớn hơn 50 kí tự',
            'pos_image.required' => 'Chưa có ảnh',
            'pos_hot.required' => 'Chọn tin nổi bật',
            'pos_status.required' => 'Chọn trạng thái',
        ]);

        if($request->hasFile('pos_image')){
            $file = $request->file('pos_image');
            $extends = $file->getClientOriginalExtension();

            if ($extends != 'jpg' && $extends != 'png' && $extends != 'jpeg') {
                return redirect()->back()->with('thongbao', 'Chỉ được nhập các file hình ảnh có đuôi JPG, PNG và JPEG!');
            }

            $name = $file->getClientOriginalName();
            $image = Str::random(5)."_".$name;
            while (file_exists("storage/uploads/post/".$image)) {
                $image = Str::random(5)."_".$name;
            }
            $file->move("storage/uploads/post/",$image);
            Posts::where('pos_id', $id)->update([
                'pos_title' => $request->title,
                'pos_slug' => Str::slug($request->title),
                'pos_description' => $request->description,
                'pos_content' => $request->pos_content,
                'pos_image' => $image,
                'pos_hot' => $request->pos_hot,
                'pos_status' => $request->pos_status,
                'pos_cat_id' => $request->category,
                'pos_admin_id' => 1,
                'pos_website' => $request->pos_website,
                'pos_updated_at' => time(),
            ]);
        }
        return redirect('admin/posts')->with('thongbao', 'Sửa bài viết thành công');
    }
    public function getDelete($id)
    {
        Posts::where('pos_id', $id)->delete();
        return redirect('admin/posts')->with('thongbao', 'Xóa thành công');
    }
}
