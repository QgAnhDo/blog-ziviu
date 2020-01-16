<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $table = 'posts';
    public $prefix = 'pos';
    public $primaryKey = 'pos_id';
}
