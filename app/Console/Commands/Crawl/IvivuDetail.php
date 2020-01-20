<?php

namespace App\Console\Commands\Crawl;

use Illuminate\Console\Command;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;
use App\Models\Post;

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
        $posts = Post::select('pos_id', 'pos_website')->where('pos_crawl_status', 0)->limit(10)->get();

        foreach ($posts as $item) {
            //git file html với link pos_website
            $html = HtmlDomParser::file_get_html($item->pos_website, false, null, 0 );
            //mảng lưu trữ
            $response = [
                "content" => $html->find('.entry-content', 0)->plaintext,
            ];

            $data_insert = [
                "pos_content"=> $response["content"],
                "pos_crawl_status"=> 1,
                "pos_status"=> 1,
                "pos_updated_at"=> time()
            ];

            Post::where('pos_id', $item->pos_id)->update($data_insert);
        }

        dd($data_insert);
    }
}
