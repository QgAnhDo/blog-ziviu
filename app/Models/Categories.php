<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $table = 'categories';
    public $prefix = 'cat';
    public $primaryKey  = 'cat_id';
}
