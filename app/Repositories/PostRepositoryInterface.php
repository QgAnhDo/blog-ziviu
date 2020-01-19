<?php

namespace App\Repositories;

interface PostRepositoryInterface {

    public function getPostById($id);

    public function getPostTags($id);
}
