<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $table = 'posts';
    public $prefix = 'pos';
    public $primaryKey = 'pos_id';

    public function getImgPosts($size = 'default', $folder = 'posts')
    {

        $img = $this->pos_image;

        if (!$img) {
            return url('/assets/images/no-image.png');
        }
        return parse_image($folder, $size, $img);

    }
}
