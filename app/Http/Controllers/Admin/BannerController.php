<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Str;

class BannerController extends Controller
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
        $banner = Banner::all();
        return view('admin.banner.list', ['banner' => $banner]);
    }

    public function getAdd() {
        return view('admin.banner.add');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'ban_name' => 'required',
            'ban_picture' => 'required',
        ],[
            'ban_name.required' => 'Chưa nhập tên banner',
            'ban_picture.required' => 'Yêu cầu nhập ảnh'
        ]);

        if($request->hasFile('ban_picture')){
            $file = $request->file('ban_picture');
            $extends = $file->getClientOriginalExtension();

            if ($extends != 'jpg' && $extends != 'png' && $extends != 'jpeg') {
                return redirect()->back()->with('thongbao', 'Chỉ được nhập các file hình ảnh có đuôi JPG, PNG và JPEG!');
            }

            $name = $file->getClientOriginalName();
            $image = Str::random(5)."_".$name;
            while (file_exists("storage/uploads/banner/".$image)) {
                $image = Str::random(5)."_".$name;
            }
            $file->move("storage/uploads/banner/",$image);

            Banner::insert([
                'ban_name' => $request->ban_name,
                'ban_picture' => $image,
                'ban_link' => $request->ban_link,
                'ban_description' => $request->ban_description,
                'ban_active' => $request->ban_active,
                'admin_id' => 1,
            ]);
        }
        return redirect('admin/banner')->with('thongbao', 'Thêm banner thành công');
    }

    public function getEdit($id)
    {
        $banner = Banner::where('ban_id', $id)->first();
        return view('admin.banner.edit', ['banner' => $banner]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'ban_name' => 'required',
            'ban_picture' => 'required',
        ],[
            'ban_name.required' => 'Chưa nhập tên banner',
            'ban_picture.required' => 'Yêu cầu nhập ảnh'
        ]);

        if($request->hasFile('ban_picture')){
            $file = $request->file('ban_picture');
            $extends = $file->getClientOriginalExtension();

            if ($extends != 'jpg' && $extends != 'png' && $extends != 'jpeg') {
                return redirect()->back()->with('thongbao', 'Chỉ được nhập các file hình ảnh có đuôi JPG, PNG và JPEG!');
            }

            $name = $file->getClientOriginalName();
            $image = Str::random(5)."_".$name;
            while (file_exists("storage/uploads/banner/".$image)) {
                $image = Str::random(5)."_".$name;
            }
            $file->move("storage/uploads/banner/",$image);

            Banner::where('ban_id', $id)->update([
                'ban_name' => $request->ban_name,
                'ban_picture' => $image,
                'ban_link' => $request->ban_link,
                'ban_description' => $request->ban_description,
                'ban_active' => $request->ban_active,
                'admin_id' => 1,
            ]);
        }
        return redirect('admin/banner')->with('thongbao', 'Thêm banner thành công');
    }

    public function getDelete($id)
    {
        Banner::where('ban_id', $id)->delete();
        return redirect('admin/banner')->with('thongbao', 'Xóa thành công');
    }
}
