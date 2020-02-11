<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Models\PostTag;
use Carbon\Carbon;

class PostRepository implements PostRepositoryInterface {

    public function getPostById($id)
    {

        return Posts::leftJoin('categories', 'pos_cat_id', '=', 'cat_id')
            ->leftJoin('admin', 'pos_admin_id', '=', 'adm_id')
            ->where('pos_id', $id)
            ->select('pos_id', 'pos_title', 'pos_slug', 'pos_image', 'pos_description', 'pos_content', 'pos_status', 'pos_website', 'pos_rating', 'pos_created_at', 'pos_updated_at', 'cat_id', 'cat_name', 'cat_slug', 'adm_id', 'adm_name', 'adm_loginname')
            ->first();
    }

    public function getPostTags($id)
    {
        return PostTag::join('tags', 'pota_tag_id', '=', 'tag_id')
            ->where('pota_post_id', $id)->where('tag_active', 1)
            ->select('pota_post_id', 'tag_id', 'tag_name', 'tag_slug', 'tag_active')
            ->get();
    }

    public function getPostRelateHot($id)
    {
        $postDetail = Posts::where('pos_id', $id)
            ->select('pos_id', 'pos_cat_id')
            ->first();
        if($postDetail)
            return Posts::where('pos_cat_id', $postDetail->pos_cat_id)
                ->where('pos_id', '<>', $id)->where('pos_hot', 1)
                ->select('pos_id', 'pos_title', 'pos_slug', 'pos_image', 'pos_hot', 'pos_created_at')
                ->orderBy('pos_id', 'desc')
                ->limit(3)
                ->get();
    }

    public function getPostRelate($id)
    {
        $postDetail = Posts::where('pos_id', $id)
            ->select('pos_id', 'pos_cat_id')
            ->first();
        if($postDetail)
            return Posts::where('pos_cat_id', $postDetail->pos_cat_id)
                ->where('pos_id', '<>', $id)->where('pos_hot', 0)
                ->select('pos_id', 'pos_title', 'pos_slug', 'pos_image', 'pos_hot', 'pos_created_at')
                ->orderBy('pos_id', 'desc')
                ->limit(3)
                ->get();
    }
}
