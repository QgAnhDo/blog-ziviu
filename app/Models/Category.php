<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    public function getLinkCategory() {
        return route('categories.index', ['slug' => $this->cat_slug, 'id' => $this->cat_id]);
    }
}
