@extends('layouts.master')
@section('title')
    {{$post->pos_title}} - Blog.Ziviu
@endsection
@section('og:url')
    <meta property="og:url" content="{{$post->getLinkPost()}}" />
@endsection
@section('og:image')
    <meta property="og:image" content="{{$post->getImgPosts()}}" />
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="assets/css/post/style_detail.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive/style_detail-responsive.min.css">
<div id="body">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0"></script>
    <div class="body_content detail_content">
        <div class="container">
            <div class="detail_left">
                <div class="detail_placeholder">
                    <div class="detail_header">
                        <div class="detail_wrapper">
                            <ul>
                                <li>
                                    <strong><a href="/" title="Quay lại trang chủ"><span>Trang chủ</span></a></strong>
                                </li>
                                <li>
                                    <span class="split_arrow">›</span>
                                </li>
                                <li>
                                    <strong>
                                        <a href="{{route('categories.index', ['slug' => $post->cat_slug, 'id' => $post->cat_id])}}"
                                           title="{{$post->cat_name}}">
                                            <span>{{$post->cat_name}}</span>
                                        </a>
                                    </strong>
                                </li>
                                <li>
                                    <span class="split_arrow">›</span>
                                </li>
                                <li class="active">
                                    <strong>
                                        <a href="{{$post->getLinkPost()}}" title="{{$post->pos_title}}">{{$post->pos_title}}</a>
                                    </strong>
                                </li>
                            </ul>
                        </div>
                        <h1> {{$post->pos_title}} </h1>
                        <div class="detail_meta">
                            <span class="meta_author">{{$post->adm_loginname}} ,</span>
                            <span class="meta_source">Theo <a href="{{$post->pos_website}}" target="_blank">
                                    {{str_ireplace('www.', '', parse_url($post->pos_website, PHP_URL_HOST))}}</a>
                            </span>
                            <span class="meta_time">
                                @if($post->pos_created_at)
                                {{date_format($post->pos_created_at,'H:i - d/m/Y')}}
                                @endif
                            </span>
                        </div>
                        <div class="detail_socials">
                            <div class="fb-like" data-href="{{$post->getLinkPost()}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                            </div>
                        </div>
                    </div>
                    <div class="detail_maincontent">
                        <div class="content_menu_nav">
                            <div class="content_menu_wrapper" id="menuNav">
                                <div class="kmnw_content">
                                    <div class="kc_item kc_facebook">
                                        <a href="#"></a>
                                    </div>
                                    <div class="kc_item kc_email">
                                        <a href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_w640">
                            <h2>{{$post->pos_description}}</h2>
                            <div class="knc_relate_wrapper">
                                <ul>
                                    @if($postRelate)
                                        @foreach ($postRelate as $item)
                                    <li>
                                        <a href="{{$item->getLinkPost()}}">
                                            {{$item->pos_title}}
                                            <i class="icon-show-popup"></i>
                                        </a>
                                    </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div data-check-position="genk_body_start">
                                <img src= "{{$post->getImgPosts()}}" width="100%" title="{{$post->pos_title}}" alt="{{$post->pos_title}}">
                            </div>
                            <div class="knc_content"><?= $post->pos_content ?></div>
                            <div data-check-position="genk_body_end"></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="detailtag_and_video">
                        <div class="dav_social clearfix"></div>
                        <div class="dav_new_tags clearfix">
                            <span class="tgname">Tags:</span>
                            <ul>
                                @foreach($postTag as $item)
                                <li>
                                    <a href="{{route('tags.index', ['slug' => $item->tag_slug, 'id' => $item->tag_id])}}" title="{{$item->tag_name}}">
                                        <strong>{{$item->tag_name}}</strong>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="detail_comment">
                        <p class="detail_comment_title">Bình luận</p>
                        <div class="fb-comments" data-href="{{$post->getLinkPost()}}"
                             data-width="710px" data-numposts="5"></div>
                    </div>
                </div>
                <div class="same_category_news">
                    <div class="same_category_news_content clearfix">
                        <h3 class="same_category_news_title">Tin cùng chuyên mục</h3>
                        <ul class="same_category_news_list">
                            <li style="padding: 25px 0 10px 0;">
                                <ul class="same_category_news_list">
                                    <div class="rowccm clearfix" id="ccm_row1">
                                        @if($postRelateHot)
                                            @foreach($postRelateHot as $item)
                                        <li>
                                            <a href="{{$item->getLinkPost()}}">
                                                <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                            </a>
                                            <div class="info">
                                                <h4>
                                                    <a href="{{$item->getLinkPost()}}" title="{{$item->pos_title}}">
                                                        {{$item->pos_title}}
                                                    </a>
                                                    @if($item->pos_hot == 1)
                                                    <span>Nổi bật</span>
                                                    @endif
                                                </h4>
                                                <span class="time">{{getTimeDuration(time()-strtotime($item->pos_created_at))}}</span>
                                            </div>
                                        </li>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="rowccm clearfix" id="ccm_row2">
                                        @if($postRelate)
                                            @foreach($postRelate as $item)
                                                <li>
                                                    <a href="{{$item->getLinkPost()}}">
                                                        <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                                    </a>
                                                    <div class="info">
                                                        <h4>
                                                            <a href="{{$item->getLinkPost()}}" title="{{$item->pos_title}}">
                                                                {{$item->pos_title}}
                                                            </a>
                                                            @if($item->pos_hot == 1)
                                                                <span>Nổi bật</span>
                                                            @endif
                                                        </h4>
                                                        <span class="time">{{getTimeDuration(time()-strtotime($item->pos_created_at))}}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="detail_right">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
</div>
<?php
$schema_data = [
    "@context"=> "http://schema.org",
    "@type" => "NewsArticle",
    "headline" => $post->pos_title,
    "description" => $post->pos_description,
    "datePublished" => $post->pos_created_at,
    "dateModified" => $post->pos_updated_at,
    "mainEntityOfPage" => [
        "@type" => "WebPage",
        "@id" => $post->getLinkPost(),
    ],
    "image" => [
        "@type" => "ImageObject",
        "url" => $post->getImgPosts(),
    ],
    "author" => [
        "@type" => "Person",
        "name" => $post->adm_loginname
    ],
    "publisher" => [
        "@type" => "Organization",
        "name" => "Blog.Ziviu",
        "logo" => [
            "@type" => "ImageObject",
            "url" => asset('')."assets/images/favicon.png"
        ]
    ]
];
$schema_data_bread = [
    "@context"=> "http://schema.org",
    "@type"=> "BreadcrumbList",
    "itemListElement"=> [
        [
            "@type" => "ListItem",
            "position" => 0,
            "item" => [
                "@id" => asset(''),
                "name" => "Trang chủ"
            ]
        ],
        [
            "@type" => "ListItem",
            "position" => 1,
            "item" => [
                "@id" => route('categories.index', ['slug' => $post->cat_slug, 'id' => $post->cat_id]),
                "name" => $post->cat_name
            ]
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "item" => [
                "@id" => $post->getLinkPost(),
                "name" => $post->pos_title
            ]
        ]
    ]
];
?>
<script type="application/ld+json"><?= json_encode($schema_data_bread) ?></script>
<script type="application/ld+json"><?= json_encode($schema_data) ?></script>
@endsection
