<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories";

    const CREATED_AT = 'cat_created_at';
    const UPDATED_AT = 'cat_updated_at';

    public function getLinkCategory() {
        return route('categories.index', ['slug' => $this->cat_slug, 'id' => $this->cat_id]);
    }
}
