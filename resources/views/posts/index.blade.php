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
{{--                            <span class="meta_source">Theo <a href="#">Trí Thức Trẻ</a></span>--}}
                            <span class="meta_time">{{$post->pos_created_at}}</span>
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
                                    @foreach ($categoriesHot->hot2->hot3->posts as $item)
                                    <li>
                                        <a href="{{ route('posts.index', ['slug' => $item->pos_slug, 'id' => $item->pos_id]) }}">
                                            {{$item->pos_title}}
                                            <i class="icon-show-popup"></i>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div style="clear: both;"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div data-check-position="genk_body_start"></div>
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
                                <div class="fb-like" data-href="http://genk.vn/vi-sao-ios-13-cang-cap-nhat-cang-lam-loi-cuu-ki-su-apple-vua-dua-ra-cau-tra-loi-cuc-ky-xac-dang-cho-van-de-nay-20191027175708348.chn" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true">
                                </div>
                            </div>
                            <div class="dav_social_3">
                                <div id="sponsorzone_button_vp_button_zone">
                                    <a href="#">
                                        <div id="vp_button_right"></div>
                                    </a>
                                    <div id="vp_button_text_left">
                                        <div class="vpb_icon"></div>
                                        <span class="vpb_text">Bấm để thiết lập</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dav_new_tags clearfix">
                            <span class="tgname">Tags:</span>
                            <ul>
                                <li><a href="#"><strong>tính năng mới</strong></a></li>
                                <li><a href="#"><strong>ceo tìm book</strong></a></li>
                                <li><a href="#"><strong>chia sẻ ảnh</strong></a></li>
                                <li><a href="#"><strong>kỹ sư phần mềm</strong></a></li>
                                <li><a href="#"><strong>phần mềm mac</strong></a></li>
                                <li><a href="#"><strong>hệ điều hành mới</strong></a></li>
                                <li><a href="#"><strong>lỗi nghiêm trọng</strong></a></li>
                            </ul>
                        </div>
                        <div class="dav_box_ads_details">
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
                        </div>
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
								<div class="view_news_by_date">
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
								</div>
							</span>
                        <ul class="same_category_news_list">
                            <li style="padding: 25px 0 10px 0;">
                                <ul class="same_category_news_list">
                                    <div class="rowccm clearfix" id="ccm_row1">
                                        <li>
                                            <a href="#"><img src="images/detail/news_1.jpg"></a>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">Chiếc iPhone SE 2 sắp ra mắt chắc chắn là mẫu smartphone dành cho Tổng thống Trump  </a>
                                                    <span>Nổi bật</span>
                                                </h4>
                                                <span class="time">18 phút trước</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/detail/news_1.jpg"></a>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">Chiếc iPhone SE 2 sắp ra mắt chắc chắn là mẫu smartphone dành cho Tổng thống Trump  </a>
                                                    <span>Nổi bật</span>
                                                </h4>
                                                <span class="time">18 phút trước</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/detail/news_2.jpg"></a>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">Đây là ốp lưng kiêm sạc dự phòng cho bộ ba iPhone 11?</a>

                                                </h4>
                                                <span class="time">18 phút trước</span>
                                            </div>
                                        </li>
                                    </div>
                                    <div class="rowccm clearfix" id="ccm_row2">
                                        <li>
                                            <a href="#"><img src="images/detail/news_3.jpg"></a>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">iPhone 2020 sẽ có màn hình ProMotion 120Hz, đem lại trải nghiệm siêu mượt</a>

                                                </h4>
                                                <span class="time">18 phút trước</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/detail/news_3.jpg"></a>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">iPhone 2020 sẽ có màn hình ProMotion 120Hz, đem lại trải nghiệm siêu mượt</a>

                                                </h4>
                                                <span class="time">18 phút trước</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#"><img src="images/detail/news_3.jpg"></a>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">iPhone 2020 sẽ có màn hình ProMotion 120Hz, đem lại trải nghiệm siêu mượt</a>

                                                </h4>
                                                <span class="time">18 phút trước</span>
                                            </div>
                                        </li>
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
    <?php /*
    <div class="body_content news_content">
        <div class="container">
            <div class="main_content">
                <div class="main_content_1">
                    <p class="main_content_title">NỔI BẬT TRANG CHỦ</p>
                    <div class="main_content_1_big">
                        <div>
                            <a href="#"><img src="images/qc1.png"></a>
                            <h2>
                                <a href="#">Google Chrome 78 chính thức ra mắt: Chế độ Dark Mode mặc định cho mọi trang web</a>
                            </h2>
                            <p>Forced Dark Mode là một tính năng mới, cho phép biến giao diện của mọi trang web thành nền tối, cho dù trang web đó có được hỗ trợ hay không.
                            </p>
                        </div>
                    </div>
                    <div class="main_content_1_small">
                        <div>
                            <a href="#"><img src="images/qc2.jpg"></a>
                            <h2>
                                <a href="#">Báo cáo nghiên cứu mới: Với công nghệ du hành Vũ trụ và vật liệu hiện tại, ta đã có thể làm thang máy không gian</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="main_content_3">
                    <p class="main_content_title">ĐỌC THÊM</p>
                    <ul>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Xperia 5 sẽ là chiếc điện thoại flagship 4G cuối cùng của Sony</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhiều nhà sản xuất smartphone đang chuẩn bị tung ra các mẫu điện thoại 5G. Và Sony không phải là ngoại...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Xperia 5 sẽ là chiếc điện thoại flagship 4G cuối cùng của Sony</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhiều nhà sản xuất smartphone đang chuẩn bị tung ra các mẫu điện thoại 5G. Và Sony không phải là ngoại...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div>
                                <a href="#"><img src="images/iframe.jpg"></a>
                            </div>
                        </li>
                        <div class="content_extra">
                            <li class="content_3_trendAd">
                                <div class="read_more_and_brands_stuff">
                                    <div class="read_more" style="max-height: 575px; height: 575px;">
                                        <div class="tab">ĐÁNG CHÚ Ý</div>
                                        <div class="item first">
                                            <div class="ava">
                                                <a href="#">
                                                    <img src="images/extra1.jpg">
                                                </a>
                                            </div>
                                            <h3>
                                                <a href="#">
                                                    Vì sao iPhone có ít RAM hơn 90% máy Android mà vẫn chạy mượt mà hơn? Và tại sao điện thoại Trung Quốc cần cực kỳ nhiều RAM?
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="item">
                                            <h3>
                                                <a href="#">
                                                    Điện thoại gaming nhan nhản nhưng game thủ vẫn dùng iPhone 8 Plus để thi đấu chuyên nghiệp
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="item">
                                            <h3>
                                                <a href="#">
                                                    Sau 500 năm, MIT mới chứng minh được thiết kế cầu của Leonardo Da Vinci là cực kỳ hợp lý và thông minh
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="marketing_beats">
                                        <div class="tab">
                                            <a href="#" class="tabTitle">MYGENK</a>
                                            <a href="#" class="tabViewMore"></a>
                                        </div>
                                        <div class="list_marketing">
                                            <ul>
                                                <li class="item" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">
                                                            Dùng tia laser quét từ trên không, phát hiện kinh đô cổ 1200 năm tuổi tưởng chỉ có trong truyền thuyết
                                                        </a>
                                                    </h3>
                                                    <a class="item_image" href="#"><img src="images/extra2.jpg"></a>
                                                </li>
                                                <li class="item" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">
                                                            Đọc xong hướng dẫn sử dụng mới biết đa số chúng ta đã đi thang cuốn sai cách
                                                        </a>
                                                    </h3>
                                                    <a class="item_image" href="#"><img src="images/extra2.jpg"></a>
                                                </li>
                                                <li class="item after" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">Đẳng cấp chơi trội: Trời nóng 50 độ C, Qatar lắp luôn điều hòa nhiệt độ khồng lồ ngoài trời để người dân thấy mát mẻ hơn</a>
                                                    </h3>
                                                </li>
                                                <li class="item after" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">Trên tay miếng dán "nâng cấp" iPhone XS thành iPhone 11 Pro: giá 80 nghìn thôi nhưng mà đừng mua</a>
                                                    </h3>
                                                </li>
                                                <li class="item after" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">Kỹ sư NASA tuyên bố Động cơ Xoắn ốc của mình có thể đạt tới 99% vận tốc ánh sáng, sự thật thế nào?</a>
                                                    </h3>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_4.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Samsung tung concept mới về smartphone màn hình gập kiểu vỏ sò</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Concept mới này có thiết kế giống như một điện thoại màn hình gập vỏ sò truyền thống.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_4.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Samsung tung concept mới về smartphone màn hình gập kiểu vỏ sò</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Concept mới này có thiết kế giống như một điện thoại màn hình gập vỏ sò truyền thống.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_4.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Samsung tung concept mới về smartphone màn hình gập kiểu vỏ sò</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Concept mới này có thiết kế giống như một điện thoại màn hình gập vỏ sò truyền thống.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_4.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Samsung tung concept mới về smartphone màn hình gập kiểu vỏ sò</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Concept mới này có thiết kế giống như một điện thoại màn hình gập vỏ sò truyền thống.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_4.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Samsung tung concept mới về smartphone màn hình gập kiểu vỏ sò</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Concept mới này có thiết kế giống như một điện thoại màn hình gập vỏ sò truyền thống.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <div class="content_extra_2">
                            <div class="mostview_and_beat read_more_and_brands_stuff">
                                <div class="mostview">
                                    <div class="tab">Đọc nhiều</div>
                                    <ul>
                                        <li>
                                            <a class="item_images" href="#"><img src="images/extra3.jpg"></a>
                                            <h3>
                                                <a href="#">Sharp tuyên bố văn bản mà Asanzo dùng để minh oan là giả mạo, sẽ tiến hành khởi kiện</a>
                                            </h3>
                                        </li>
                                        <li>
                                            <a class="item_images" href="#"><img src="images/extra3.jpg"></a>
                                            <h3>
                                                <a href="#">Sharp tuyên bố văn bản mà Asanzo dùng để minh oan là giả mạo, sẽ tiến hành khởi kiện</a>
                                            </h3>
                                        </li>
                                        <li>
                                            <a class="item_images" href="#"><img src="images/extra3.jpg"></a>
                                            <h3>
                                                <a href="#">Sharp tuyên bố văn bản mà Asanzo dùng để minh oan là giả mạo, sẽ tiến hành khởi kiện</a>
                                            </h3>
                                        </li>
                                        <li>
                                            <a class="item_images" href="#"><img src="images/extra3.jpg"></a>
                                            <h3>
                                                <a href="#">Sharp tuyên bố văn bản mà Asanzo dùng để minh oan là giả mạo, sẽ tiến hành khởi kiện</a>
                                            </h3>
                                        </li>
                                    </ul>
                                </div>
                                <div class="brands">
                                    <div class="tab">Cũ mà hay</div>
                                    <div class="other">
                                        <h3 class="first">
                                            <a href="#">Ngôi nhà cấp 4 ở Vĩnh Long: nhìn mặt ngoài bé nhỏ cũ kỹ, bước vào trong thấy mình lạc vào hang động...</a>
                                        </h3>
                                        <h3 class="first">
                                            <a href="#">Ngôi nhà cấp 4 ở Vĩnh Long: nhìn mặt ngoài bé nhỏ cũ kỹ, bước vào trong thấy mình lạc vào hang động...</a>
                                        </h3>
                                        <h3>
                                            <a href="#">Video 2 phút do chính Samsung thực hiện giải thích tường tận lý do vì sao Galaxy Note7...</a>
                                        </h3>
                                        <h3>
                                            <a href="#">Video 2 phút do chính Samsung thực hiện giải thích tường tận lý do vì sao Galaxy Note7...</a>
                                        </h3>
                                        <h3>
                                            <a href="#">Video 2 phút do chính Samsung thực hiện giải thích tường tận lý do vì sao Galaxy Note7...</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_5.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Thị phần Apple tại Việt Nam giảm sâu nhất trong hơn một năm trở lại đây</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Apple giảm thị phần liên tiếp trong 3 tháng, chạm mức đáy vào tháng 9 năm nay, ở mức thấp nhất của hãng này tại Việt Nam trong thời gian gần đây.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_5.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Thị phần Apple tại Việt Nam giảm sâu nhất trong hơn một năm trở lại đây</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Apple giảm thị phần liên tiếp trong 3 tháng, chạm mức đáy vào tháng 9 năm nay, ở mức thấp nhất của hãng này tại Việt Nam trong thời gian gần đây.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_5.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Thị phần Apple tại Việt Nam giảm sâu nhất trong hơn một năm trở lại đây</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Apple giảm thị phần liên tiếp trong 3 tháng, chạm mức đáy vào tháng 9 năm nay, ở mức thấp nhất của hãng này tại Việt Nam trong thời gian gần đây.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_5.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Thị phần Apple tại Việt Nam giảm sâu nhất trong hơn một năm trở lại đây</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Apple giảm thị phần liên tiếp trong 3 tháng, chạm mức đáy vào tháng 9 năm nay, ở mức thấp nhất của hãng này tại Việt Nam trong thời gian gần đây.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_5.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Thị phần Apple tại Việt Nam giảm sâu nhất trong hơn một năm trở lại đây</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Apple giảm thị phần liên tiếp trong 3 tháng, chạm mức đáy vào tháng 9 năm nay, ở mức thấp nhất của hãng này tại Việt Nam trong thời gian gần đây.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <div class="content_extra_3">
                            <div class="dontmiss">
                                <p class="title-box">Đừng bỏ lỡ</p>
                                <ul>
                                    <li>
                                        <div class="dontmiss_img">
                                            <a href="#"><img src="images/extra4.jpg"></a>
                                        </div>
                                        <div class="dontmiss_text">
                                            <h4>
                                                <a href="#">Quan tâm iPhone 11 làm gì, xem Galaxy Fold vừa mới về Việt Nam đây này!</a>
                                            </h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dontmiss_img">
                                            <a href="#"><img src="images/extra4.jpg"></a>
                                        </div>
                                        <div class="dontmiss_text">
                                            <h4>
                                                <a href="#">Quan tâm iPhone 11 làm gì, xem Galaxy Fold vừa mới về Việt Nam đây này!</a>
                                            </h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dontmiss_img">
                                            <a href="#"><img src="images/extra4.jpg"></a>
                                        </div>
                                        <div class="dontmiss_text">
                                            <h4>
                                                <a href="#">Quan tâm iPhone 11 làm gì, xem Galaxy Fold vừa mới về Việt Nam đây này!</a>
                                            </h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content_extra_4">
                            <li>
                                <div class="eMag-home_genk">
                                    <div class="title">
                                        <a href="#"><span>e</span>Magazine</a>
                                    </div>
                                    <div class="swiper_container">
                                        <div class="owl-carousel owl-theme item-carousel swiper_wrapper">
                                            <div class="swiper_slide">
                                                <div class="post_slide">
                                                    <a href="#" class="thumb">
                                                        <i style="background-image: url('https://genknews.genkcdn.vn/zoom/250_155/2019/2019-10-17-ava-ngang-15712978503271038875457-0-0-500-800-crop-1571297872614-15713057428001321259781-637069283679837500.jpg')"></i>
                                                    </a>
                                                    <a href="#" class="post">
                                                        <span>Công nghệ EcoBubble - Sức sáng tạo mãnh liệt của Samsung không chỉ ở riêng smartphone</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper_slide">
                                                <div class="post_slide">
                                                    <a href="#" class="thumb">
                                                        <i style="background-image: url('https://genknews.genkcdn.vn/zoom/250_155/2019/2019-10-17-ava-ngang-15712978503271038875457-0-0-500-800-crop-1571297872614-15713057428001321259781-637069283679837500.jpg')"></i>
                                                    </a>
                                                    <a href="#" class="post">
                                                        <span>Công nghệ EcoBubble - Sức sáng tạo mãnh liệt của Samsung không chỉ ở riêng smartphone</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper_slide">
                                                <div class="post_slide">
                                                    <a href="#" class="thumb">
                                                        <i style="background-image: url('https://genknews.genkcdn.vn/zoom/250_155/2019/2019-10-17-ava-ngang-15712978503271038875457-0-0-500-800-crop-1571297872614-15713057428001321259781-637069283679837500.jpg')"></i>
                                                    </a>
                                                    <a href="#" class="post">
                                                        <span>Công nghệ EcoBubble - Sức sáng tạo mãnh liệt của Samsung không chỉ ở riêng smartphone</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper_slide">
                                                <div class="post_slide">
                                                    <a href="#" class="thumb">
                                                        <i style="background-image: url('https://genknews.genkcdn.vn/zoom/250_155/2019/2019-10-17-ava-ngang-15712978503271038875457-0-0-500-800-crop-1571297872614-15713057428001321259781-637069283679837500.jpg')"></i>
                                                    </a>
                                                    <a href="#" class="post">
                                                        <span>Công nghệ EcoBubble - Sức sáng tạo mãnh liệt của Samsung không chỉ ở riêng smartphone</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Làm cách nào mà Huawei vẫn có thể ra mắt smartphone mới với dịch vụ của Google? Hóa ra có một cách rất đơn giản</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhưng không phải là biện pháp lâu dài.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Làm cách nào mà Huawei vẫn có thể ra mắt smartphone mới với dịch vụ của Google? Hóa ra có một cách rất đơn giản</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhưng không phải là biện pháp lâu dài.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Làm cách nào mà Huawei vẫn có thể ra mắt smartphone mới với dịch vụ của Google? Hóa ra có một cách rất đơn giản</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhưng không phải là biện pháp lâu dài.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Làm cách nào mà Huawei vẫn có thể ra mắt smartphone mới với dịch vụ của Google? Hóa ra có một cách rất đơn giản</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhưng không phải là biện pháp lâu dài.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/detail/news_6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">Làm cách nào mà Huawei vẫn có thể ra mắt smartphone mới với dịch vụ của Google? Hóa ra có một cách rất đơn giản</a></h4>
                                <div class="item_meta">
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Nhưng không phải là biện pháp lâu dài.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ads">
                <div class="ads_1">
                    <div class="ads_1_banner">
                        <img src="images/ads-1.jpg">
                    </div>
                </div>
                <div class="ads_2">
                    <div class="ads_2_banner">
                        <img src="images/ads-1.jpg">
                    </div>
                </div>
                <div class="ads_3">
                    <div class="ads_3_banner">
                        <img src="images/ads-1.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    */?>
</div>
