<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    public $table = 'post_tags';
    public $prefix = 'pota';
    public $primaryKey = 'pota_id';

    const CREATED_AT = 'pota_created_at';
    const UPDATED_AT = 'pota_updated_at';
}
