<?php

namespace App\Repositories;

interface CategoryRepositoryInterface {

    public function getCategoryById($id);

    public function getPostByCategory($id);

    public function getPostHotByCategory($id);
}
