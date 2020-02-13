<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";

    const CREATED_AT = 'tag_created_at';
    const UPDATED_AT = 'tag_updated_at';
}
