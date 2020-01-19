<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Models\PostTag;

class PostRepository implements PostRepositoryInterface {

    public function getPostById($id)
    {
        return Posts::join('categories', 'pos_cat_id', '=', 'cat_id')
            ->join('admin', 'pos_admin_id', '=', 'adm_id')
            ->where('pos_id', $id)
            ->select('pos_id', 'pos_title', 'pos_slug', 'pos_description', 'pos_content', 'pos_status', 'pos_rating', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug', 'adm_id', 'adm_name', 'adm_loginname')
            ->first();
    }

    public function getPostTags($id)
    {
        return PostTag::join('tags', 'pota_tag_id', '=', 'tag_id')
            ->where('pota_post_id', $id)->where('tag_active', 1)
            ->select('pota_post_id', 'tag_id', 'tag_name', 'tag_slug', 'tag_active')
            ->get();
    }
}
