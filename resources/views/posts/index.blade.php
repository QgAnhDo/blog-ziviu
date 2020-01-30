<link rel="stylesheet" type="text/css" href="assets/css/style_detail.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive/style_detail-responsive.css">
<div id="body">
    <div class="body_content detail_content">
        <div class="container">
            <div class="detail_left">
                <div class="detail_placeholder">
                    <div class="detail_header">
                        <div class="detail_wrapper">
                            <ul>
                                <li>
                                    <strong><a href="/"><span>Trang chủ</span></a></strong>
                                </li>
                                <li>
                                    <span class="split_arrow">›</span>
                                </li>
                                <li class="active">
                                    <strong>
                                        <a href="{{ route('categories.index', ['slug' => $post->cat_slug, 'id' => $post->cat_id]) }}">
                                            <span>{{$post->cat_name}}</span>
                                        </a>
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
                            <span class="meta_time">{{date('h:m - d/m/Y',$post->pos_created_at)}}</span>
                        </div>
                        <div class="detail_socials">
                            <div class="fb-like" data-href="http://genk.vn/vi-sao-ios-13-cang-cap-nhat-cang-lam-loi-cuu-ki-su-apple-vua-dua-ra-cau-tra-loi-cuc-ky-xac-dang-cho-van-de-nay-20191027175708348.chn" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                            </div>
                            <div class="fr">
                                <div class="mgr5"></div>
                                <a href="#"><div class="ico-mailto"></div></a>
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
                                        <a href="{{ route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]) }}">
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
                                <img src= "{{$post->getImgPosts()}}" width="100%">
                            </div>
                            <div class="knc_content"><?= $post->pos_content ?></div>
                            <div data-check-position="genk_body_end"></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="detailtag_and_video">
                        <div class="dav_social clearfix">
                            <div class="dav_social_1">
                                <a href="#"><i class="linkhaytop"></i></a>
                            </div>
                            <div class="dav_social_1">
                                <div class="fb-send"></div>
                            </div>
                            <div class="dav_social_2">
                                <div class="fb-like" data-href="http://genk.vn/vi-sao-ios-13-cang-cap-nhat-cang-lam-loi-cuu-ki-su-apple-vua-dua-ra-cau-tra-loi-cuc-ky-xac-dang-cho-van-de-nay-20191027175708348.chn" data-width="710px" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                                </div>
                            </div>
                            <?php /* <div class="dav_social_3">
                                <div id="sponsorzone_button_vp_button_zone">
                                    <a href="#">
                                        <div id="vp_button_right"></div>
                                    </a>
                                    <div id="vp_button_text_left">
                                        <div class="vpb_icon"></div>
                                        <span class="vpb_text">Bấm để thiết lập</span>
                                    </div>
                                </div>
                            </div> */ ?>
                        </div>
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
                        <?php /* <div class="dav_box_ads_details">
                            <div class="dav_box_video">
                                <div class="dav_box_video_title">
                                    <h3>VIDEO HAY TỪ WORLD CUP 2022</h3>
                                </div>
                                <iframe width="100%" height="357.188" src="https://www.youtube.com/embed/bMKyVwqW2aM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="dav_box_ads">
                                <div style="float: left;"><img src="images/detail/ads_video.jpg"></div>
                                <div style="float: right;"><img src="images/detail/ads_video.jpg"></div>
                            </div>
                        </div> */ ?>
                    </div>
                    <div class="detail_comment">
                        <p class="detail_comment_title">Bình luận</p>
                        <div class="fb-comments" data-href="http://genk.vn/vi-sao-ios-13-cang-cap-nhat-cang-lam-loi-cuu-ki-su-apple-vua-dua-ra-cau-tra-loi-cuc-ky-xac-dang-cho-van-de-nay-20191027175708348.chn"
                             data-width="710px" data-numposts="5"></div>
                    </div>
                </div>
                <div class="same_category_news">
                    <div class="same_category_news_content clearfix">
                        <span class="same_category_news_title">Tin cùng chuyên mục
                            <?php /* <div class="view_news_by_date">
                                <span>Xem theo ngày</span>
                                <form action="detail_submit" method="get" accept-charset="utf-8">
                                    <ul class="clearfix">
                                        <li>
                                            <select name="">
                                                <option value="0">Ngày</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="">
                                                <option value="0">Tháng</option>
                                                <option value="1">Tháng 1</option>
                                                <option value="2">Tháng 2</option>
                                                <option value="3">Tháng 3</option>
                                                <option value="4">Tháng 4</option>
                                                <option value="5">Tháng 5</option>
                                                <option value="6">Tháng 6</option>
                                                <option value="7">Tháng 7</option>
                                                <option value="8">Tháng 8</option>
                                                <option value="9">Tháng 9</option>
                                                <option value="10">Tháng 10</option>
                                                <option value="11">Tháng 11</option>
                                                <option value="12">Tháng 12</option>
                                            </select>
                                        </li>
                                        <li>
                                            <select name="">
                                                <option value="0">Năm</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                            </select>
                                        </li>
                                        <li>
                                            <button type="button" class="view" id="viewbydate">Xem</button>
                                        </li>
                                    </ul>
                                </form>
                            </div> */ ?>
                        </span>
                        <ul class="same_category_news_list">
                            <li style="padding: 25px 0 10px 0;">
                                <ul class="same_category_news_list">
                                    <div class="rowccm clearfix" id="ccm_row1">
                                        @if($postRelateHot)
                                            @foreach($postRelateHot as $item)
                                        <li>
                                            <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                                <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                            </a>
                                            <div class="info">
                                                <h4>
                                                    <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                        {{$item->pos_title}}
                                                    </a>
                                                    @if($item->pos_hot == 1)
                                                    <span>Nổi bật</span>
                                                    @endif
                                                </h4>
                                                <span class="time">{{getTimeDuration(time()-$item->pos_created_at)}}</span>
                                            </div>
                                        </li>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="rowccm clearfix" id="ccm_row2">
                                        @if($postRelate)
                                            @foreach($postRelate as $item)
                                                <li>
                                                    <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}">
                                                        <img src="{{$item->getImgPosts()}}" title="{{$item->pos_title}}" alt="{{$item->pos_title}}">
                                                    </a>
                                                    <div class="info">
                                                        <h4>
                                                            <a href="{{route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id])}}" title="{{$item->pos_title}}">
                                                                {{$item->pos_title}}
                                                            </a>
                                                            @if($item->pos_hot == 1)
                                                                <span>Nổi bật</span>
                                                            @endif
                                                        </h4>
                                                        <span class="time">{{getTimeDuration(time()-$item->pos_created_at)}}</span>
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
                @include('../layouts/sidebar')
            </div>
        </div>
    </div>
</div>
