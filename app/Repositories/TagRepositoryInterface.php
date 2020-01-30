<?php

namespace App\Repositories;

interface TagRepositoryInterface {

    public function getTagById($id);

    public function getPostByTag($id);
}
