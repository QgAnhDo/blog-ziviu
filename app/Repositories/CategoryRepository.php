<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Models\Posts;

class CategoryRepository implements CategoryRepositoryInterface {
//SELECT * FROM categories WHERE cat_id IN ( SELECT IF(cat_parent_id=0,cat_id,cat_parent_id) FROM categories WHERE cat_id = $id);
    public function getCategoryById($id)
    {
        $a = Categories::where('cat_id', $id)->selectRaw('IF(cat_parent_id=0,cat_id,cat_parent_id)')->first();
        $categoryId = Categories::whereIn('cat_id', $a)
            ->select('cat_id','cat_name','cat_slug','cat_parent_id')
            ->first();
            $categoryChild = Categories::where('cat_parent_id', $categoryId->cat_id)
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
            ->paginate(20);
    }

    public function getPostHotByCategory($id)
    {
        $postsHot = Posts::where('pos_cat_id', $id)->where('pos_hot', 1)->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_description', 'pos_cat_id', 'pos_status', 'pos_hot', 'pos_created_at')
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
