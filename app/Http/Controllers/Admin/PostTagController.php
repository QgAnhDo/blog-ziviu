<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostTag;
use App\Models\Posts;
use App\Models\Tag;

class PostTagController extends Controller
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
        $post_tags = PostTag::join('posts', 'pota_post_id', '=', 'pos_id')->join('tags', 'pota_tag_id', '=', 'tag_id')
            ->select('pota_id', 'pota_post_id', 'pos_id', 'pos_title', 'pota_tag_id', 'tag_id', 'tag_name', 'pota_created_at', 'pota_updated_at')
            ->get();
        return view('admin.post_tags.list', ['post_tags' => $post_tags]);
    }

    public function getAdd() {
        $post = Posts::where('pos_status', 1)->orderBy('pos_id', 'desc')->select('pos_id', 'pos_title')->get();
        $tags = Tag::where('tag_active', 1)->orderBy('tag_name', 'asc')->select('tag_id', 'tag_name')->get();
        return view('admin.post_tags.add', ['post' => $post, 'tags' => $tags]);
    }
    public function postAdd(Request $request) {
        $this->validate($request, [
            'pota_post_id' => 'required',
            'pota_tag_id' => 'required',
        ],[
            'pota_post_id.required' => 'Chọn tin tức',
            'pota_tag_id.required' => 'Chọn tag',
        ]);

        PostTag::insert([
            'pota_post_id' => $request->pota_post_id,
            'pota_tag_id' => $request->pota_tag_id,
        ]);

        return redirect('admin/post-tags')->with('thongbao', 'Thêm thành công');
    }

    public function getEdit($id) {
        $post_tags = PostTag::where('pota_id', $id)->first();
        $post = Posts::where('pos_status', 1)->orderBy('pos_id', 'desc')->select('pos_id', 'pos_title')->get();
        $tags = Tag::where('tag_active', 1)->orderBy('tag_name', 'asc')->select('tag_id', 'tag_name')->get();

        return view('admin.post_tags.edit', ['post_tags' => $post_tags, 'post' => $post, 'tags' => $tags]);
    }
    public function postEdit(Request $request, $id) {
        $this->validate($request, [
            'pota_post_id' => 'required',
            'pota_tag_id' => 'required',
        ],[
            'pota_post_id.required' => 'Chọn tin tức',
            'pota_tag_id.required' => 'Chọn tag',
        ]);

        PostTag::where('pota_id', $id)->update([
            'pota_post_id' => $request->pota_post_id,
            'pota_tag_id' => $request->pota_tag_id,
        ]);
        return redirect('admin/post-tags')->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id)
    {
        PostTag::where('pota_id', $id)->delete();
        return redirect('admin/post-tags')->with('thongbao', 'Xóa thành công');
    }
}
