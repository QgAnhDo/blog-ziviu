<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\Posts;

class CategoryRepository implements CategoryRepositoryInterface {

    public function getCategoryById($id)
    {
        $categoryId = Categories::where('cat_id', $id)
            ->select('cat_id','cat_name','cat_slug','cat_parent_id')
            ->first();
            $categoryChild = Categories::where('cat_parent_id', $id)
                ->where('cat_active', 1)
                ->select('cat_id', 'cat_name', 'cat_slug', 'cat_parent_id', 'cat_active')
                ->get();
            $categoryId->cat_child = $categoryChild;
        return $categoryId;
    }

    public function getPostByCategory($id)
    {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->where('pos_cat_id', $id)->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_description', 'pos_cat_id', 'pos_status', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug')
            ->orderBy('pos_id', 'desc')
            ->get();
    }

    public function getPostHotByCategory($id)
    {
        $postsHot = Posts::where('pos_cat_id', $id)->where('pos_hot', 1)->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_description', 'pos_status', 'pos_hot', 'pos_created_at')
            ->orderBy('pos_id', 'desc')
            ->first();
        if($postsHot) {
            $postsHotSmall = Posts:: where('pos_id', '<', $postsHot->pos_id)->where('pos_cat_id', $id)
                ->where('pos_hot', 1)->where('pos_status', 1)
                ->select('pos_id','pos_title', 'pos_slug', 'pos_description', 'pos_status', 'pos_hot', 'pos_created_at')
                ->orderBy('pos_id', 'desc')
                ->first();
            $postsHot->hotSmall = $postsHotSmall;
        }
        return $postsHot;
    }
}
