<?php

namespace App\Console\Commands\Crawl;

use Illuminate\Console\Command;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;
use App\Models\Posts;

class Travel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:Travel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl web travel.com.vn';

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
        $request = [
            // "mode"=> $this->confirm('Do you want crawl Travel?')
            'mode'=> true
        ];
        $cats = [
            [
                "url"=> 'https://travel.com.vn/du-lich-viet-nam.aspx',
                "cat_id"=> 7,
            ],
        ];

        //vòng lặp tạo category
        foreach($cats as $item) {
            //check diều kiện nếu data cũ tồn tại
            if($request["mode"]) {
                // Get total page
                $html = HtmlDomParser::file_get_html($item["url"], false, null, 0 );
            }
            else {
                return "Crawl error!";
            }

            $data_insert = [];
            //vòng lặp để add các bài viết
            foreach($html->find('.col-lg-11') as $article) {
                $title = html_entity_decode($article->find('.tour-name>a>h3', 0)->plaintext, ENT_QUOTES, "UTF-8");

                $response = [
                    "title" => $title,
                    "description" => $title,
                    "image"=> $article->find('.pos-relative>a>img', 0)->src,
                    "view" => $article->find('.votes', 0)->plaintext,
                    "website" => 'https://travel.com.vn'.$article->find('.tour-name>a', 0)->href,
                    "cats" => $item["cat_id"],
                    "created_at" => time()
                ];

                $result = $this->saveImage($response['image'], Str::slug($response['title']));
                $response['image'] = implode('/', $result);
                //get file html với link pos_website
                $html_detail = HtmlDomParser::file_get_html($response['website'], false, null, 0 );

                //mảng lưu trữ
                $response["content"] = $html_detail->find('.chuongtrinhtour', 0)->plaintext;
             
                if ($response !== null) {
                    $ch = curl_init();
                    $test = curl_setopt_array($ch, array(
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_URL => route('posts'),
                        CURLOPT_POST => count($response),
                        CURLOPT_POSTFIELDS => $response,
                    ));

                    $result = curl_exec($ch);
                }
            }
        }
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
}
