@extends('layouts.master')

@section('title')
    Tìm kiếm: {{$_GET['name']}} - Blog.Ziviu
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="assets/css/category/style_categories.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive/style_categories-responsive.css">
<div id="body">
    <div class="categories_content">
        <div class="container">
            <div class="main_content">
                <h1>Kết quả tìm kiếm: {{$_GET['name']}}</h1>
                <div class="main_content_3">
                    <ul>
                        @foreach($findPost as $item)
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="{{ route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]) }}" title="{{ $item->pos_title }}">
                                    <img src="{{$item->getImgPosts()}}" width="250" height="155"
                                         title="{{ $item->pos_title }}" alt="{{ $item->pos_title }}">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title">
                                    <a href="{{ route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]) }}" title="{{ $item->pos_title }}">
                                        {{ $item->pos_title }}
                                    </a>
                                </h4>
                                <div class="item_meta">
                                    <a href="{{ route('categories.index', ['slug'=> $item->cat_slug, 'id'=> $item->cat_id]) }}" title="{{ $item->cat_name }}">
                                        {{ $item->cat_name }}
                                    </a>
                                    -
                                    <span>{{ getTimeDuration(time()-$item->pos_created_at) }}</span>
                                </div>
                                <span class="item_sapo">{{ $item->pos_description }}</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div align="center">{{ $findPost->appends(['name' => $_GET['name']])->links() }}</div>
            </div>
            @include('layouts.sidebar')
        </div>
    </div>
</div>
@endsection
