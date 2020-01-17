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
        $urls = [
            'https://www.ivivu.com/blog/2020/01/4-quan-bun-cha-lau-doi-nhat-ha-noi/'
        ];
        foreach ($urls as $link) {
            $html = HtmlDomParser::file_get_html($urls[0], false, null, 0 );
            $response = [
                "content" => $html->find('.entry-content', 0)->plaintext,
                "title"=> $html->find('.entry-title', 0)->plaintext,
                "description" => $html->find('.entry-content>p>strong>em', 0)->plaintext,
                "image" => $html->find('.entry-content #attachment_320609>img', 0)->src,
                "category" => $html->find('#breadcrumbs>span>a', 0)->plaintext,
                "website" => $html->find('#breadcrumbs>span>span>span>span>a', 0)->href,
                "created_at" => $html->find('.entry-header>div>div>p>span', 0)->plaintext,
            ];
            dd($response);
            // $result = $this->saveImage($response['image'], Str::slug($response['title']));        
            // $response['image'] = implode('/', $result);

            // if(Post::where('pos_slug', Str::slug($response["title"]))->first() === null) {
            //     $data_insert[] = [
            //         'pos_title' => $response['title'],
            //         'pos_slug' => Str::slug($response['title']),
            //         'pos_description' => $response['description'],
            //         'pos_website' => $response['website'],
            //         'pos_view' => $response['view'],
            //         'pos_image' => $response['image'],
            //         'pos_hot' => 1,
            //         'pos_status' => 1,
            //         'pos_cat_id' => $item["cat_id"],
            //         'pos_admin_id' => 1,
            //         'pos_crawl_status' => 1,
            //         'pos_created_at' => $response['created_at'],
            //     ];
            // }    
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
