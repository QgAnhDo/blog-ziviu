<?php

namespace App\Console\Commands\Crawl;

use Illuminate\Console\Command;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Post;
use App\Models\Media;
use App\Models\PostMedia;

class TheGioiDiDong extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:TheGioiDiDong';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl thế giới di động';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $html = HtmlDomParser::file_get_html('https://www.thegioididong.com/tin-tuc/danh-gia-chi-tiet-apple-iphone-7-plus-2019-1186953', false, null, 0 );
        $response = [
            "content" => $html->find('.artrating', 0)->plaintext,
            "title"=> $html->find('.bgtrans h1', 0)->plaintext,
            "description" => $html->find('.artrating h2', 0)->plaintext,
            "image" => $html->find('.artrating .imgwrap>img', 0)->getAttribute('data-original'),
            "author" => $html->find('.bgtrans .userdetail>a', 0)->plaintext,
            "category" => $html->find('.wrap-main .actmenu', 0)->plaintext,
            "website" => "https://www.thegioididong.com/tin-tuc/danh-gia-chi-tiet-apple-iphone-7-plus-2019-1186953",
        ];

        $text = '(2019) Đ&#225;nh gi&#225; chi tiết iPhone 7 Plus: &#39;Cũ x&#236;&#39; thiết kế nhưng vẫn &#39;xịn&#39;, 2019-d225nh-gi225-chi-tiet-iphone-7-plus-39cu-x23639-thiet-ke-nhung-van-39xin39, Hiện đ
ã đến năm 2019, và bạn đang băn khoăn không biết có nên mua iPhone 7 Plus hay không. Và để biết được câu trả lời của mình, hãy cùng xem ngay bài đánh giá chi tiết iPhone 7 Plus ở bên dưới nhé.
, https://www.thegioididong.com/tin-tuc/danh-gia-chi-tiet-apple-iphone-7-plus-2019-1186953, Hiện đã đến năm 2019, và bạn đang băn khoăn không biết có nên mua iPhone 7 Plus hay không. Và để biế
t được câu trả lời của mình, hãy cùng xem ngay bài đánh giá chi tiết iPhone 7 Plus ở bên dưới nhé.';
        $title1 = $this->clean($text);
        $title2 = Str::slug($text);
        dd($title1, $title2);

        $result = $this->saveImage($response['image'], Str::slug($response['title']));
        
        $response['image'] = implode('/', $result);

        // Post::insert([
        //     'pos_title' => $response['title'],
        //     'pos_slug' => Str::slug($response['title']),
        //     'pos_description' => $response['description'],
        //     'pos_meta' => $response['website'],
        //     'pos_content' => $response['content'],
        //     'pos_image' => $response['image'],
        //     'pos_hot' => 1,
        //     'pos_status' => 1,
        //     'pos_cat_id' => 10,
        //     'pos_admin_id' => 1,
        //     'pos_created_at' => date('Y-m-d H:i:s'),
        // ]);

        echo 'Đã thêm bản ghi';
    }
    private function saveImage($url, $base_name) {
        $ext = explode('.', $url);
        $ext = $ext[count($ext)-1];
        $ext = empty($ext) ? 'jpg' : $ext;
        $ext = explode('?', $ext)[0];

        $file_name = $base_name .'.'. $ext;

        $date = date('Y/m/d', time());
        $folder = storage_path('app/public/uploads/post/'. $date);
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        $fp = @fopen(implode('/', [$folder, $file_name]), 'w+');
        fwrite($fp, $result);
        fclose($fp);

        return ["folder"=> $date, "file_name"=> $file_name];
    }

    function clean($string) {
       $string = preg_replace('/[^a-zA-Z0-9_ -]/s','',$string); // Removes special chars.
       return $string; // Replaces multiple hyphens with single one.
    }
}
