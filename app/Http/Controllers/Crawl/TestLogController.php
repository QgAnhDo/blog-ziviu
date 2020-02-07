<?php

use Illuminate\Support\Facades\Storage;

$contents = Storage::get('2n1d-o-du-thuyen-paradise-grand-lan-ha-5-sao-3-bua-an-xe-dua-don-tu-ha-noi-chi-4099000-dong.png');
echo $contents;

$url = Storage::url('uploads/post/2020/02/03/2n1d-o-du-thuyen-paradise-grand-lan-ha-5-sao-3-bua-an-xe-dua-don-tu-ha-noi-chi-4099000-dong.png');
$exists = Storage::disk('s3')->exists('uploads/post/2020/02/03/2n1d-o-du-thuyen-paradise-grand-lan-ha-5-sao-3-bua-an-xe-dua-don-tu-ha-noi-chi-4099000-dong.png');
$size = Storage::size('uploads/post/2020/02/03/2n1d-o-du-thuyen-paradise-grand-lan-ha-5-sao-3-bua-an-xe-dua-don-tu-ha-noi-chi-4099000-dong.png');

$test = Storage::disk('local')->put('log/Crawl.log', 'Contents');

if($test !== null){
	return 'success!';
} else {
	return 'error!';
}
