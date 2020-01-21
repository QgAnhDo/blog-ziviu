<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\Posts;

class HomeRepository implements HomeRepositoryInterface {

    public function getCategories()
    {
        $categories = Categories::where('cat_parent_id', 0)
            ->where('cat_active', 1)
            ->select('cat_id', 'cat_name', 'cat_slug', 'cat_parent_id', 'cat_active')
            ->get();
        foreach ($categories as $value) {
            $categoriesChild = Categories::where('cat_parent_id', $value->cat_id)
                ->where('cat_active', 1)
                ->select('cat_id', 'cat_name', 'cat_slug', 'cat_parent_id', 'cat_active')
                ->get();
            $value->cat_child = $categoriesChild;
        }
        return $categories;
    }

    public function getCategoriesId($id)
    {
        return Categories::find($id);
    }

    public function getPosts()
    {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_description', 'pos_image', 'pos_cat_id', 'pos_status', 'pos_rating', 'pos_view', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug')
            ->orderBy('pos_id', 'desc')
            ->limit(5)
            ->get();
    }

    public function getRestaurantPosts()
    {}

    public function getPostsHot()
    {
        $postsHot = Posts::where('pos_hot', 1)
            ->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_status', 'pos_hot', 'pos_created_at')
            ->orderBy('pos_id', 'desc')
            ->first();
        if($postsHot) {
            $postsHotSmall = Posts:: where('pos_id', '<', $postsHot->pos_id)
                ->where('pos_hot', 1)
                ->where('pos_status', 1)
                ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_status', 'pos_hot', 'pos_created_at')
                ->orderBy('pos_id', 'desc')
                ->first();
            $postsHot->hotSmall = $postsHotSmall;
            if($postsHotSmall) {
                $postsHotSmaller = Posts:: where('pos_id', '<', $postsHotSmall->pos_id)
                    ->where('pos_hot', 1)
                    ->where('pos_status', 1)
                    ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_status', 'pos_hot', 'pos_created_at')
                    ->orderBy('pos_id', 'desc')
                    ->first();
                $postsHot->hotSmaller = $postsHotSmaller;
            }
        }
        if($postsHotSmall) {
            $postsHotSmaller = Posts::where('pos_id', '<', $postsHotSmall->pos_id)
                ->where('pos_hot', 1)
                ->where('pos_status', 1)
                ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_status', 'pos_hot', 'pos_created_at')
                ->orderBy('pos_id', 'desc')
                ->first();
            $postsHot->hotSmaller = $postsHotSmaller;
        }
        return $postsHot;
    }

    public function getCategoriesHot() {
        $categoriesHot = Categories::join('posts', 'pos_cat_id', '=', 'cat_id')
            ->where('cat_hot', 1)
            ->where('cat_active', 1)
            ->select('cat_id', 'cat_name')
            ->orderBy('cat_id', 'desc')
            ->first();
        if ($categoriesHot) {
            $categoriesHotPosts = Posts::where('pos_cat_id', $categoriesHot->cat_id)
                ->where('pos_status', 1)
                ->select('pos_id', 'pos_title', 'pos_slug', 'pos_image')
                ->orderBy('pos_id', 'desc')
                ->limit(4)
                ->get();
            $categoriesHot->posts = $categoriesHotPosts;

            $categoriesHot2 = Categories::join('posts', 'pos_cat_id', '=', 'cat_id')
                ->where('cat_id', '<>', $categoriesHot->cat_id)
                // ->where('cat_hot', 1)
                ->where('cat_active', 1)
                ->select('cat_id', 'cat_name')
                ->orderBy('cat_id', 'desc')
                ->first();

            if($categoriesHot2) {
                $categoriesHotPosts2 = Posts::where('pos_cat_id', $categoriesHot2->cat_id)
                    ->where('pos_status', 1)
                    ->select('pos_id', 'pos_title', 'pos_slug', 'pos_image')
                    ->orderBy('pos_id', 'desc')
                    ->limit(2)
                    ->get();
                $categoriesHot2->posts = $categoriesHotPosts2;
                $categoriesHot->hot2 = $categoriesHot2;

                $categoriesHot3 = Categories::join('posts', 'pos_cat_id', '=', 'cat_id')
                    ->where('cat_id', '<', $categoriesHot2->cat_id)
                    ->where('cat_hot', 1)
                    ->where('cat_active', 1)
                    ->select('cat_id', 'cat_name')
                    ->orderBy('cat_id', 'desc')
                    ->first();
                if($categoriesHot3) {
                    $categoriesHotPosts3 = Posts::where('pos_cat_id', $categoriesHot3->cat_id)
                        ->where('pos_status', 1)
                        ->select('pos_id', 'pos_title', 'pos_slug', 'pos_image')
                        ->orderBy('pos_id', 'desc')
                        ->limit(3)
                        ->get();
                    $categoriesHot3->posts = $categoriesHotPosts3;
                    $categoriesHot2->hot3 = $categoriesHot3;
                }
            }
        }
        return $categoriesHot;
    }

    public function getPostRating()
    {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_cat_id', 'pos_status', 'pos_rating', 'pos_view', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug')
            ->orderBy('pos_rating', 'desc')
            ->limit(5)
            ->get();
    }

    public function getPostView()
    {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_cat_id', 'pos_status', 'pos_rating', 'pos_view', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug')
            ->orderBy('pos_view', 'desc')
            ->limit(5)
            ->get();
    }
}
