<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Models\Tag;
use App\Models\PostTag;

class TagRepository implements TagRepositoryInterface {

    public function getTagById($id)
    {
        return Tag::where('tag_id', $id)->select('tag_id', 'tag_name', 'tag_slug')->first();
    }

    public function getPostByTag($id)
    {
        return Posts::join('post_tags', 'pota_post_id', '=', 'pos_id')
            ->join('categories', 'cat_id', '=', 'pos_cat_id')
            ->where('pota_tag_id', $id)->where('pos_status', 1)->whereNotNull('pos_slug')
            ->select('pos_id', 'pos_title', 'pos_slug', 'pos_description', 'pos_image', 'pos_cat_id', 'pos_hot', 'pos_status', 'pos_created_at', 'cat_id', 'cat_name', 'cat_slug', 'pota_post_id', 'pota_tag_id')
            ->paginate(10);
    }
}
