<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Posts;

class CategoryRepository implements CategoryRepositoryInterface {
//SELECT * FROM categories WHERE cat_id IN ( SELECT IF(cat_parent_id=0,cat_id,cat_parent_id) FROM categories WHERE cat_id = $id);
    public function getCategoryById($id)
    {
        $findCatId = Category::where('cat_id', $id)->selectRaw('IF(cat_parent_id=0,cat_id,cat_parent_id)')->first();
        $categoryId = Category::whereIn('cat_id', $findCatId)
            ->select('cat_id','cat_name','cat_slug','cat_parent_id')
            ->first();
            $categoryChild = Category::where('cat_parent_id', $categoryId->cat_id)
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
            ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_cat_id', 'pos_status', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug')
            ->orderBy('pos_id', 'desc')
            ->paginate(10);
    }
}
