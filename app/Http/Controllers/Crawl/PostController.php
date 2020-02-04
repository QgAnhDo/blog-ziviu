<?php

namespace App\Http\Controllers\Crawl;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;
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
        $posts = Posts::where('pos_content', NULL)->get();
        return response()->json($posts, Response::HTTP_OK);
    }

    public function update(Request $request, $post_id)
    {
    	//mảng lưu trữ content
    	$put = [
    		'content'=> $request->input('content'),
    	];

    	$data_update = [
            "pos_content"=> $put["content"],
            "pos_crawl_status"=> 1,
            "pos_status"=> 1,
            "pos_updated_at"=> time()
        ];

        $post = Posts::where('pos_id', $post_id)->first();
        //check điều kiện nếu có bài viết
        if($post !== null) {
        	Posts::where('pos_id', $post_id)->update($data_update);
        	return response()->json(['status'=> 1, 'mess'=> 'Success !']);
        } else {
        	return response()->json(['status'=> 0, 'mess'=> 'Error !']);
        }
    }

    public function insert(Request $request)
    {
    	$response = [
    		'title' => $request->input('title'),
    		'image' => $request->input('image'),
    		'content' => $request->input('content'),
    		'view' => $request->input('view'),
            'description' => $request->input('description'),
            'website' => $request->input('website'),
            'created_at' => time()
    	];

    	$data_insert = [
            'pos_title' => $response['title'],
            'pos_slug' => Str::slug($response['title']),
            'pos_description' => $response['description'],
            'pos_website' => $response['website'],
            'pos_view' => $response['view'],
            'pos_image' => $response['image'],
            'pos_content' => $response['content'],
            'pos_hot' => 1,
            'pos_status' => 1,
            'pos_cat_id' => 1,
            'pos_admin_id' => 1,
            'pos_crawl_status' => 0,
            'pos_created_at' => $response['created_at'],
        ];

        $test = Posts::insert($data_insert);
        if ($test !== null) {
        	return response()->json(['status'=> 1, 'mess'=> 'Success !']);
        } else {
        	return response()->json(['status'=> 0, 'mess'=> 'Error!']);
        }
    }
}
