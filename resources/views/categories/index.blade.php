@extends('layouts.master')

@section('title')
    {{$category->cat_name}} - Blog.Ziviu
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="assets/css/category/style_categories.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive/style_categories-responsive.min.css">
<div id="body">
    <div class="categories_content">
        <div class="container">
            <div class="main_content">
                <div class="main_content_1">
                    <div class="main_content_1_submenu">
                        <ul>
                            <li>
                                <a href="{{route('categories.index', ['slug' => $category->cat_slug, 'id' => $category->cat_id])}}"
                                   class="@foreach($post as $value)
                                               @if($value->pos_cat_id == $category->cat_id) {{'active'}}
                                               @else {{null}}
                                               @endif
                                           @endforeach">
                                    {{$category->cat_name}}
                                    <span></span>
                                </a>
                            </li>
                            <?php foreach ($category->cat_child as $item) { ?>
                            <li>
                                <a href="{{route('categories.index', ['slug' => $item->cat_slug, 'id' => $item->cat_id])}}"
                                   class="@foreach($post as $value)
                                               @if($value->pos_cat_id == $item->cat_id) {{'active'}}
                                               @else {{null}}
                                               @endif
                                           @endforeach">
                                    <?= $item->cat_name ?>
                                    <span></span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                @if(count($post) > 0)
                <div class="main_content_3">
                    <ul>
                        @foreach ($post as $item)
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="{{ route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]) }}" title="{{ $item->pos_title }}">
                                    <img src="{{$item->getImgPosts()}}" width="250" height="155"
                                         title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title">
                                    <a href="{{ route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]) }}" title="{{$item->pos_title}}">
                                        {{$item->pos_title}}
                                    </a>
                                </h4>
                                <div class="item_meta">
                                    <a href="{{ route('categories.index', ['slug' => $item->cat_slug, 'id' => $item->cat_id]) }}">
                                        {{$item->cat_name}}
                                    </a>
                                    -
                                    <span>{{getTimeDuration(time()-strtotime($item->pos_created_at))}}</span>
                                </div>
                                <span class="item_sapo">
                                    {{$item->pos_description}}
                                </span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div align="center">{{ $post->links() }}</div>
                @else
                <div class="main_content_3">
                    <ul>
                        <li class="content_3_item">
                            <div class="item_info">
                                <h4 class="item_title"><a>KHÔNG CÓ DỮ LIỆU</a></h4>
                            </div>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>
<?php
$schema_data = [
    "@context"=> "http://schema.org",
    "@type"=> "CollectionPage",
    "mainEntity"=> [
        "@type"=> "ItemList",
        "itemListElement"=> []
    ]
];
foreach($post as $item) {
    $schema_data["mainEntity"]["itemListElement"][] = [
        "@type" => "ListItem",
        "url" => route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]),
        "name" => $item->pos_title,
        "description" => $item->pos_description,
        "image" => $item->getImgPosts()
    ];
}
?>
<script type="application/ld+json"><?= json_encode($schema_data) ?></script>
@endsection
