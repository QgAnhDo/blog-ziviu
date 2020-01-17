<?php

namespace App\Repositories;

use App\Models\Posts;

class PostRepository implements PostRepositoryInterface {

    public function getPostById($id)
    {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->join('admin', 'pos_admin_id', '=', 'adm_id')
            ->where('pos_id', $id)
            ->select('pos_id', 'pos_title', 'pos_slug', 'pos_description', 'pos_content', 'pos_status', 'pos_rating', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug', 'adm_id', 'adm_name')
            ->first();
    }
}
