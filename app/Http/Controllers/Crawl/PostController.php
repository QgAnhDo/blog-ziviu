<?php

namespace App\Http\Controllers\Crawl;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Posts;

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

    //lấy danh sách bài viết chưa update
    public function index()
    {
        $posts = Posts::where('pos_updated_at', NULL)->get();
        return response()->json($posts, Response::HTTP_OK);
    }
}
