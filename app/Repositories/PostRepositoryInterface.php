<?php

namespace App\Repositories;

interface PostRepositoryInterface {

    public function getPostById($id);

    public function getPostTags($id);

    public function getPostRelateHot($id);

    public function getPostRelate($id);
}
