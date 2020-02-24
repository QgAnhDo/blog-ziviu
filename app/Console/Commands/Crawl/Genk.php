<?php

namespace App\Console\Commands\Crawl;

use Illuminate\Console\Command;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;
use App\Models\Posts;

class Genk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:genk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl web Genk';

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
//        $html = HtmlDomParser::file_get_html('https://genk.vn/mobile.chn');
//
//        // Find all images
//        foreach($html->find('.kscliw-ava img') as $element)
//            dd($element->src);
//            echo $element->src . '<br>';
        $request = [
             "mode"=> $this->confirm('Do you want crawl Genk?')
        ];
        $cats = [
            [
                "url"=> 'https://genk.vn/mobile.chn',
                "cat_id"=> 1,
            ],
        ];

        //vòng lặp tạo category
        foreach($cats as $item) {
            //check diều kiện nếu data cũ tồn tại
            if($request["mode"] == 'yes') {
                // Get total page
                $html = HtmlDomParser::file_get_html($item["url"], false, null, 0 );
                $total_page = 1;
                foreach ($html->find('.btnviewmore') as $page_numbers) {
                    $total_page = (int)$page_numbers->plaintext > $total_page ? (int)$page_numbers->plaintext : $total_page;
                }
            }
            else {
                $total_page = 1;
            }
            for($page = 1; $page<=$total_page; $page++) {
                $url = $item["url"] . "?page={$page}";

                $html = HtmlDomParser::file_get_html($url, false, null, 0);

                //Insert multi
                $data_insert = [];
                //vòng lặp để add các bài viết
                foreach($html->find('.knswli') as $article) {
                    //convert html symbol to text
                    $title = html_entity_decode($article->find('.knswli-left>a>img', 0)->alt, ENT_QUOTES, "UTF-8");
                    $description = html_entity_decode($article->find('.knswli-sapo', 0)->plaintext, ENT_QUOTES, "UTF-8");
//                    $strTime = str_replace('/', '-', $article->find('.date', 0)->plaintext);

                    $response = [
                        "title" => $title,
                        "image"=> $article->find('.knswli-left>a>img', 0)->getAttribute('data-src'),
//                        "view" => $article->find('.data-view', 0)->plaintext,
                        "description" => $description,
                        "website" => 'https://genk.vn'.$article->find('.knswli-left>a', 0)->href,
//                        "created_at" => strtotime($strTime),
                        "cats" => $item["cat_id"]
                    ];

                    $result = $this->saveImage($response['image'], Str::slug($response['title']));
                    $response['image'] = implode('/', $result);
                    //get file html với link pos_website
                    $html_detail = HtmlDomParser::file_get_html($response['website'], false, null, 0 );

                    //mảng lưu trữ
                    $response["content"] = $html_detail->find('.knc-content', 0)->plaintext;

                    if ($response !== null) {
                        $ch = curl_init();
                        $test = curl_setopt_array($ch, array(
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_SSL_VERIFYPEER => false,
                            CURLOPT_URL => route('genk'),
                            CURLOPT_POST => count($response),
                            CURLOPT_POSTFIELDS => $response,
                        ));

                        $result = curl_exec($ch);
                    }
                    echo 'đã thêm bài viết. ';
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
