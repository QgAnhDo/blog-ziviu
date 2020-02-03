<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HomeRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\SearchRepositoryInterface;
use App\Repositories\TagRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    public $home;
    public $post;
    public $category;
    public $search;
    public $tag;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        HomeRepositoryInterface $home,
        PostRepositoryInterface $post,
        CategoryRepositoryInterface $category,
        SearchRepositoryInterface $search,
        TagRepositoryInterface $tag
    ){
//        $this->middleware('auth');
        $this->home = $home;
        $this->post = $post;
        $this->category = $category;
        $this->search = $search;
        $this->tag = $tag;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = $this->home->getCategories();
        $posts = $this->home->getPosts();
        $postsHot = $this->home->getPostsHot();
        $postRating = $this->home->getPostRating();
        $postView = $this->home->getPostView();
        $categoriesHot = $this->home->getCategoriesHot();
        $dataShow['view'] = view('index')->with([
            'posts' => $posts,
            'postsHot' => $postsHot,
            'postRating' => $postRating,
            'postView' => $postView,
            'categoriesHot' => $categoriesHot,
        ]);
        return view('layouts/master')->with([
            'categories' => $categories,
            "dataShow" => $dataShow,
        ]);
    }

    public function postDetail($slug,$id)
    {
        $request = [
            'slug'=> $slug 
        ];
        dd($request);
        $categories = $this->home->getCategories();

        $post = $this->post->getPostById($id);
        $postTag = $this->post->getPostTags($id);
        $postRelateHot = $this->post->getPostRelateHot($id);
        $postRelate = $this->post->getPostRelate($id);
        $dataShow['view'] = view('posts.index')->with([
            'post' => $post,
            'postTag' => $postTag,
            'postRelateHot' => $postRelateHot,
            'postRelate' => $postRelate,
        ]);
        return view('layouts/master')->with(['categories' => $categories,"dataShow" => $dataShow]);
    }

    public function categoryDetail($slug,$id)
    {
        $categories = $this->home->getCategories();
        $category = $this->category->getCategoryById($id);
        $post = $this->category->getPostByCategory($id);
        $postHot = $this->category->getPostHotByCategory($id);
        $dataShow['view'] = view('categories.index')->with([
            'category' => $category,
            'post' => $post,
            'postHot' => $postHot,
        ]);
        return view('layouts/master')->with(['categories' => $categories,"dataShow" => $dataShow]);
    }

    public function searchPostsName()
    {
        $name = $_GET['name'];
        $categories = $this->home->getCategories();
        $findPost = $this->search->searchPosts($name);
        $dataShow['view'] = view('search.index')->with([
            'findPost' => $findPost,
        ]);
        return view('layouts/master')->with(['categories' => $categories,"dataShow" => $dataShow]);
    }

    public function tagWithPost($slug, $id)
    {
        $categories = $this->home->getCategories();

        $tag = $this->tag->getTagById($id);
        $postTag = $this->tag->getPostByTag($id);
        $dataShow['view'] = view('tags.index')->with([
            'tag' => $tag,
            'postTag' => $postTag,
        ]);
        return view('layouts/master')->with(['categories' => $categories,"dataShow" => $dataShow]);
    }
}
