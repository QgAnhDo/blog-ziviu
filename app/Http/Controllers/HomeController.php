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
        $configuration = $this->home->getConfiguration();

        $posts = $this->home->getPosts();
        $postsHot = $this->home->getPostsHot();
        $postsHotList = $this->home->getPostsHotList();
        $postRating = $this->home->getPostRating();
        $postView = $this->home->getPostView();
        $categoriesHot = $this->home->getCategoriesHot();

//        $dataShow['view'] = view('index')->with([
//            'posts' => $posts,
//            'postsHot' => $postsHot,
//            'postRating' => $postRating,
//            'postView' => $postView,
//            'categoriesHot' => $categoriesHot,
//        ]);

        return view('index')->with([
            'categories' => $categories,

            'posts' => $posts,
            'postsHot' => $postsHot,
            'postsHotList' => $postsHotList,
            'postRating' => $postRating,
            'postView' => $postView,
            'categoriesHot' => $categoriesHot,

            'configuration' => $configuration,
        ]);
    }

    public function postDetail($slug,$id)
    {
        $request = [
            'slug' => $slug,
            'id' => $id,
        ];

        $categories = $this->home->getCategories();
        $configuration = $this->home->getConfiguration();

        $post = $this->post->getPostById($id);
        $postTag = $this->post->getPostTags($id);
        $postRelateHot = $this->post->getPostRelateHot($id);
        $postRelate = $this->post->getPostRelate($id);

        return view('posts.index')->with([
            'categories' => $categories,

            'post' => $post,
            'postTag' => $postTag,
            'postRelateHot' => $postRelateHot,
            'postRelate' => $postRelate,

            'configuration' => $configuration,
        ]);
    }

    public function categoryDetail($slug,$id)
    {
        $request = [
            'slug' => $slug,
            'id' => $id,
        ];

        $categories = $this->home->getCategories();
        $configuration = $this->home->getConfiguration();

        $category = $this->category->getCategoryById($id);
        $post = $this->category->getPostByCategory($id);

        return view('categories.index')->with([
            'categories' => $categories,

            'category' => $category,
            'post' => $post,

            'configuration' => $configuration,
        ]);
    }

    public function searchPostsName()
    {
        $name = $_GET['name'];

        $categories = $this->home->getCategories();
        $configuration = $this->home->getConfiguration();

        $findPost = $this->search->searchPosts($name);

        return view('search.index')->with([
            'categories' => $categories,
            'findPost' => $findPost,
            'configuration' => $configuration,
        ]);
    }

    public function tagWithPost($slug, $id)
    {
        $request = [
            'slug' => $slug,
            'id' => $id,
        ];

        $categories = $this->home->getCategories();
        $configuration = $this->home->getConfiguration();

        $tag = $this->tag->getTagById($id);
        $postTag = $this->tag->getPostByTag($id);

        return view('tags.index')->with([
            'categories' => $categories,

            'tag' => $tag,
            'postTag' => $postTag,

            'configuration' => $configuration,
        ]);
    }
}
