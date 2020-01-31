<?php

namespace App\Repositories;

use App\Models\Posts;

class SearchRepository implements SearchRepositoryInterface {

    public function searchPosts($name) {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->where('pos_title', 'LIKE', '%' . $name . '%')->where('pos_status', 1)
            ->select('pos_id','pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_cat_id', 'pos_status', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug')
            ->orderBy('pos_id', 'desc')
            ->paginate(10);
    }
}
