<?php

namespace App\Console\Commands\Crawl;

use Illuminate\Console\Command;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;
use App\Models\Posts;

class IvivuDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:IvivuDetail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Ivivu Detail';

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
        //lấy bài post chưa crawl trong db
        // $posts = Posts::select('pos_id', 'pos_website')->where('pos_crawl_status', 0)->limit(10)->get();
        $ch = curl_init(); 
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => "http://localhost:9083/api/posts",
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $posts = curl_exec($ch);

        $posts = json_decode($posts, true);

        foreach ($posts as $item) {
            //get file html với link pos_website
            $html = HtmlDomParser::file_get_html($item['pos_website'], false, null, 0 );  
            
            //mảng lưu trữ
            $response = [
                "content" => $html->find('.entry-content', 0)->plaintext,
            ];

            //curl post data nhận từ api
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_URL => "http://localhost:9083/api/posts/{$item['pos_id']}",
                CURLOPT_POST => count($response),
                CURLOPT_POSTFIELDS => $response,
            ));
            
            $result = curl_exec($ch);
        }
        dd('success');
    }
}
