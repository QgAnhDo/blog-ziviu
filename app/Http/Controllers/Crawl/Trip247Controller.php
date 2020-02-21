<?php

namespace App\Http\Controllers\Crawl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use KubAT\PhpSimple\HtmlDomParser;

class Trip247Controller extends Controller
{

    public function handle()
    {
//        $html = HtmlDomParser::file_get_html("https://trip247.net/tin-tuc", false, null, 0 );
        $html = HtmlDomParser::file_get_html("https://trip247.net/tin-tuc");
        dd($html);
        $text = $html->plaintext;
        dd($text);
    }
}
