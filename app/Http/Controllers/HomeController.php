<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HomeRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\SearchRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    public $home;
    public $post;
    public $category;
    public $search;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        HomeRepositoryInterface $home,
        PostRepositoryInterface $post,
        CategoryRepositoryInterface $category,
        SearchRepositoryInterface $search
    ){
//        $this->middleware('auth');
        $this->home = $home;
        $this->post = $post;
        $this->category = $category;
        $this->search = $search;
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
        $categoriesHot = $this->home->getCategoriesHot();
        $dataShow['view'] = view('index')->with([
            'posts' => $posts,
            'postsHot' => $postsHot,
            'categoriesHot' => $categoriesHot,
        ]);
        return view('layouts/master')->with([
            'categories' => $categories,
            "dataShow" => $dataShow,
        ]);
    }

    public function postDetail($slug,$id)
    {
        $categories = $this->home->getCategories();
        $categoriesHot = $this->home->getCategoriesHot();
        $post = $this->post->getPostById($id);
        $dataShow['view'] = view('posts.index')->with([
            'post' => $post,
            'categoriesHot' => $categoriesHot,
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
}
