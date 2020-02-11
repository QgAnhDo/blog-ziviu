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

    public function getImgPosts($folder = 'post')
    {

        $img = $this->pos_image;

        if (!$img) {
            return url('/assets/images/no-image.png');
        }
        return parse_image_by_file($folder, $img);

    }

    public function getLinkPost() {

        if($this->pos_slug && $this->pos_id) {
            return route('posts.index', ['slug' => $this->pos_slug, 'id' => $this->pos_id]);
        }
        if(!$this->pos_slug || !$this->pos_id) {
            return abort(404, 'Không tìm thấy trang này bỏi vì ko có dữ liệu <(") ');
        }
    }
}
