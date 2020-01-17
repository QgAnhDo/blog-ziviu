<?php

namespace App\Console\Commands\Crawl;

use Illuminate\Console\Command;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;
use App\Models\Post;

class CrawlIvivuCat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:CrawlIvivuCat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Ivivu Cat';

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
            "mode"=> true //true: crawl all data old | false: crawl new
        ];
        $cats = [
            [
                "url"=> 'https://blog.ivivu.com/category/viet-nam/',
                "cat_id"=> 1,
            ],
        ];
        foreach($cats as $item) {
            if($request["mode"]) {
                // Get total page
                $html = HtmlDomParser::file_get_html($item["url"], false, null, 0 );
                $total_page = 1;
                foreach ($html->find('.page-numbers') as $page_numbers) {
                    $total_page = (int)$page_numbers->plaintext > $total_page ? (int)$page_numbers->plaintext : $total_page;
                }                
            }
            else {
                $total_page = 1;
            }
            for($page = 1; $page<=$total_page; $page++) {
                $url = $item["url"]."page/{$page}";

                $html = HtmlDomParser::file_get_html($url, false, null, 0 );
                 //Insert multi 
                $data_insert = [];
                foreach($html->find('.one-half') as $article) {
                    preg_match_all('/(\d*) views/', $article->find('.views', 0)->plaintext, $view);
                    $view = empty($view[1][0]) ? 0 : (int)$view[1][0];

                    $strTime = str_replace('/', '-', $article->find('.date', 0)->plaintext);

                    $response = [
                        "title"=> $article->find('.entry-header>h2>a', 0)->plaintext,
                        "image" => $article->find('.overlay>a>img', 0)->src,
                        "view" => $view,
                        "description" => $article->find('.entry-excerpt>p', 0)->plaintext,
                        "website" => $article->find('.entry-header>h2>a', 0)->href,
                        "created_at" => strtotime($strTime),
                    ];

                    $result = $this->saveImage($response['image'], Str::slug($response['title']));        
                    $response['image'] = implode('/', $result);

                    if(Post::where('pos_slug', Str::slug($response["title"]))->first() === null) {
                        $data_insert[] = [
                            'pos_title' => $response['title'],
                            'pos_slug' => Str::slug($response['title']),
                            'pos_description' => $response['description'],
                            'pos_website' => $response['website'],
                            'pos_view' => $response['view'],
                            'pos_image' => $response['image'],
                            'pos_hot' => 1,
                            'pos_status' => 1,
                            'pos_cat_id' => $item["cat_id"],
                            'pos_admin_id' => 1,
                            'pos_crawl_status' => 1,
                            'pos_created_at' => $response['created_at'],
                        ];
                    }    
                    
                }
                Post::insert($data_insert);
                // echo 'Đã insert '. count($data_insert) .' bản ghi.';
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
