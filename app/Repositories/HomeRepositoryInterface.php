<?php

namespace App\Repositories;

interface HomeRepositoryInterface {

    public function getCategories();

    public function getCategoriesId($id);

    public function getPosts();

    public function getRestaurantPosts();

    public function getPostsHot();

    public function getCategoriesHot();

    public function getPostRating();

    public function getPostView();

    public function getConfiguration();
}
