<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";

    public $prefix = 'pos';
    public $primaryKey  = 'pos_id';

    const CREATED_AT = 'pos_created_at';
    const UPDATED_AT = 'pos_updated_at';
}
