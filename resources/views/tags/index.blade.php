<link rel="stylesheet" type="text/css" href="assets/css/category/style_categories.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive/style_categories-responsive.css">
<div id="body">
    <div class="categories_content">
        <div class="container">
            <div class="main_content">
                <div class="main_content_1">
                    <div class="tagsLabelTitle">
                        <span class="active">#</span>
                        <h1>{{$tag->tag_name}}</h1>
                    </div>
                    <div class="main_content_1_submenu">
                        <ul>
                            <li>
                                <a href="#" class="active">
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if(count($postTag) > 0)
                    <div class="main_content_3">
                        <ul>
                            @foreach ($postTag as $item)
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
                                            <span>{{getTimeDuration(time()-$item->pos_created_at)}}</span>
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
                    <div align="center">{{ $postTag->links() }}</div>
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
