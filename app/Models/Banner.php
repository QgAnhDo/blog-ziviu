<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $table = 'banners';

    const CREATED_AT = 'ban_created_at';
    const UPDATED_AT = 'ban_updated_at';

    public function getImgBanner($folder = 'banner')
    {
        $img = $this->ban_picture;

        if(!$img) {
            return url('/assets/images/no-image.png');
        }
        return parse_image_by_file($folder, $img);
    }
}
