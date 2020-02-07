<?php

namespace App\Repositories;

interface HomeRepositoryInterface {

    public function getCategories();

    public function getPosts();

    public function getPostsHot();

    public function getPostsHotList();

    public function getCategoriesHot();

    public function getPostRating();

    public function getPostView();

    public function getConfiguration();
}
