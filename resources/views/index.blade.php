<div id="body">
    <div class="news_content">
        <div class="container">
            <div class="main_content">
                <div class="main_content_1">
                    <div class="main_content_1_big">
                        @if($postsHot)
                        <div>
                            <a href="{{route('posts.index', ['slug' => $postsHot->pos_slug, 'id' => $postsHot->pos_id])}}">
                                <img src="{{$postsHot->getImgPosts()}}" title="{{$postsHot->pos_title}}"
                                     alt="{{$postsHot->pos_title}}">
                            </a>
                            <h2>
                                <a href="{{route('posts.index', ['slug' => $postsHot->pos_slug, 'id' => $postsHot->pos_id])}}">
                                    {{$postsHot->pos_title}}
                                </a>
                            </h2>
                            <p>{{$postsHot->pos_description}}</p>
                        </div>
                        @endif
                    </div>
                    <div class="main_content_1_small">
                        @if($postsHot)
                            @if($postsHot->hotSmall)
                        <div>
                            <a href="{{route('posts.index', ['slug' => $postsHot->hotSmall->pos_slug, 'id' => $postsHot->hotSmall->pos_id])}}">
                                <img src="{{$postsHot->hotSmall->getImgPosts()}}" title="{{$postsHot->hotSmall->pos_title}}"
                                     alt="{{$postsHot->hotSmall->pos_title}}">
                            </a>
                            <h2>
                                <a href="{{route('posts.index', ['slug' => $postsHot->hotSmall->pos_slug, 'id' => $postsHot->hotSmall->pos_id])}}">
                                    {{$postsHot->hotSmall->pos_title}}
                                </a>
                            </h2>
                            <span>{{$postsHot->hotSmall->pos_description}}</span>
                        </div>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="main_content_2">
                    <div>
                        <ul class="owl-carousel owl-theme item-carousel">
                            @if($categoriesHot)
                                @if($categoriesHot->posts)
                                    @foreach ($categoriesHot->posts as $item)
                            <li class="item">
                                <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                    <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}"
                                         alt="{{$item->pos_title}}">
                                </a>
                                <h3>
                                    <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                        {{$item->pos_title}}
                                    </a>
                                </h3>
                            </li>
                                    @endforeach
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="main_content_3">
                    <ul>
                        @foreach($posts as $item)
                            <li class="content_3_item">
                                <div class="item_image">
                                    <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                        <img src="{{$item->getImgPosts()}}" width="250" height="155"
                                             title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                    </a>
                                </div>
                                <div class="item_info">
                                    <h4 class="item_title">
                                        <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                            {{$item->pos_title}}
                                        </a>
                                    </h4>
                                    <div class="item_meta">
                                        <a href="{{route('categories.index', ['slug' => $item->cat_slug, 'id' => $item->cat_id])}}">
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
                        <div class="content_extra">
                            <li class="content_3_trendAd">
                                <div class="read_more_and_brands_stuff">
                                    <div class="read_more" {{--style="max-height: 575px; height: 575px;"--}}>
                                        <div class="tab">ĐÁNG CHÚ Ý</div>
                                        @if($postsHot)
                                            @if($postsHot->hotSmaller)
                                        <div class="item first">
                                            <div class="ava">
                                                <a href="{{route('posts.index', ['slug' => $postsHot->hotSmaller->pos_slug, 'id' => $postsHot->hotSmaller->pos_id])}}">
                                                    <img src="{{$postsHot->hotSmaller->getImgPosts()}}" title="{{$postsHot->hotSmaller->pos_title}}" alt="{{$postsHot->hotSmaller->pos_title}}">
                                                </a>
                                            </div>
                                            <h3>
                                                <a href="{{route('posts.index', ['slug' => $postsHot->hotSmaller->pos_slug, 'id' => $postsHot->hotSmaller->pos_id])}}" title="{{$postsHot->hotSmaller->pos_title}}">
                                                    {{$postsHot->hotSmaller->pos_title}}
                                                </a>
                                            </h3>
                                        </div>
                                            @endif
                                        @endif

                                        @if($categoriesHot)
                                            @if($categoriesHot->posts)
                                                @foreach ($categoriesHot->posts as $item)
                                        <div class="item">
                                            <h3>
                                                <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                    {{$item->pos_title}}
                                                </a>
                                            </h3>
                                        </div>
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                    <div class="marketing_beats">
                                        <div class="tab">
                                            <a href="/" class="tabTitle">NEWS.TRIP247</a>
                                            <a href="#" class="tabViewMore"></a>
                                        </div>
                                        <div class="list_marketing">
                                            <ul>
                                                @if($categoriesHot)
                                                    @if($categoriesHot->hot2)
                                                        @if($categoriesHot->hot2->posts)
                                                            @foreach ($categoriesHot->hot2->posts as $item)
                                                <li class="item" style="display: list-item;">
                                                    <h3>
                                                        <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                            {{$item->pos_title}}
                                                        </a>
                                                    </h3>
                                                    <a class="item_image" href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                                        <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                                    </a>
                                                </li>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endif

                                                @if($categoriesHot)
                                                    @if($categoriesHot->hot2)
                                                        @if($categoriesHot->hot2->hot3)
                                                            @if($categoriesHot->hot2->hot3->posts)
                                                                @foreach ($categoriesHot->hot2->hot3->posts as $item)
                                                <li class="item after" style="display: list-item;">
                                                    <h3>
                                                        <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                            {{$item->pos_title}}
                                                        </a>
                                                    </h3>
                                                </li>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        @foreach($postRating as $item)
                            <li class="content_3_item">
                                <div class="item_image">
                                    <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                        <img src="{{$item->getImgPosts()}}" width="250" height="155"
                                             title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                    </a>
                                </div>
                                <div class="item_info">
                                    <h4 class="item_title">
                                        <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                            {{$item->pos_title}}
                                        </a>
                                    </h4>
                                    <div class="item_meta">
                                        <a href="{{route('categories.index', ['slug' => $item->cat_slug, 'id' => $item->cat_id])}}">
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
                        <div class="content_extra_2">
                            <div class="mostview_and_beat read_more_and_brands_stuff">
                                <div class="mostview">
                                    <div class="tab">Đọc nhiều</div>
                                    <ul>
                                        @if($categoriesHot)
                                            @if($categoriesHot->posts)
                                                @foreach ($categoriesHot->posts as $item)
                                        <li>
                                            <a class="item_images" href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                                <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                            </a>
                                            <h3>
                                                <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                    {{$item->pos_title}}
                                                </a>
                                            </h3>
                                        </li>
                                                @endforeach
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                                <div class="brands">
                                    <div class="tab">Cũ mà hay</div>
                                    <div class="other">
                                        @if($categoriesHot)
                                            @if($categoriesHot->hot2)
                                                @if($categoriesHot->hot2->posts)
                                                    @foreach ($categoriesHot->hot2->posts as $item)
                                        <h3 class="first">
                                            <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                {{$item->pos_title}}
                                            </a>
                                        </h3>
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif

                                        @if($categoriesHot)
                                            @if($categoriesHot->hot2)
                                                @if($categoriesHot->hot2->hot3)
                                                    @if($categoriesHot->hot2->hot3->posts)
                                                        @foreach ($categoriesHot->hot2->hot3->posts as $item)
                                        <h3>
                                            <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                {{$item->pos_title}}
                                            </a>
                                        </h3>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($postView as $item)
                            <li class="content_3_item">
                                <div class="item_image">
                                    <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                        <img src="{{$item->getImgPosts()}}" width="250" height="155"
                                             title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                    </a>
                                </div>
                                <div class="item_info">
                                    <h4 class="item_title">
                                        <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                            {{$item->pos_title}}
                                        </a>
                                    </h4>
                                    <div class="item_meta">
                                        <a href="{{route('categories.index', ['slug' => $item->cat_slug, 'id' => $item->cat_id])}}">
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
                        <div class="content_extra_3">
                            <div class="dontmiss">
                                <p class="title-box">Đừng bỏ lỡ</p>
                                <ul>
                                    @if($categoriesHot)
                                        @if($categoriesHot->hot2)
                                            @if($categoriesHot->hot2->hot3)
                                                @if($categoriesHot->hot2->hot3->posts)
                                                    @foreach ($categoriesHot->hot2->hot3->posts as $item)
                                    <li>
                                        <div class="dontmiss_img">
                                            <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                            </a>
                                        </div>
                                        <div class="dontmiss_text">
                                            <h4>
                                                <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                    {{$item->pos_title}}
                                                </a>
                                            </h4>
                                        </div>
                                    </li>
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc10.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700:
                                        Laptop gaming quái thú vạn người mê!</a></h4>
                                <div class="item_meta">
                                    <a href="#">Đồ chơi số</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Laptop gaming không chỉ cần hiệu năng khủng mà còn phải có thiết kế đẹp hoặc độc kèm theo các công nghệ...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc10.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700:
                                        Laptop gaming quái thú vạn người mê!</a></h4>
                                <div class="item_meta">
                                    <a href="#">Đồ chơi số</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Laptop gaming không chỉ cần hiệu năng khủng mà còn phải có thiết kế đẹp hoặc độc kèm theo các công nghệ...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                    </ul>
                    {{--                    <div class="wrapperbtn">--}}
                    {{--                        <a href="#" class="btnviewmore">Xem thêm</a>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            @include('layouts/sidebar')
        </div>
    </div>
</div>
