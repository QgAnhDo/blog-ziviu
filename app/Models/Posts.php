<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $table = 'posts';
    public $prefix = 'pos';
    public $primaryKey = 'pos_id';

    const CREATED_AT = 'pos_created_at';
    const UPDATED_AT = 'pos_updated_at';

    public function getImgPosts($size = 'default', $folder = 'posts')
    {

        $img = $this->pos_image;

        if (!$img) {
            return url('/assets/images/no-image.png');
        }
        return parse_image_no_explode($folder, $size, $img);

    }
}
