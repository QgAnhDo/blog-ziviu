<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    public $table = 'post_tags';
    public $prefix = 'pota';
    public $primaryKey = 'pota_id';
}
