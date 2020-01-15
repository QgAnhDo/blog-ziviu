<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HomeRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    public $home;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        HomeRepositoryInterface $home
    ){
//        $this->middleware('auth');
        $this->home = $home;
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
        return view('layouts/master')->with([
            'categories' => $categories,
            'posts' => $posts,
            'postsHot' => $postsHot,
            'categoriesHot' => $categoriesHot,
        ]);

    }
}
