<div id="body">
    <div class="news_content">
        <div class="container">
            <div class="main_content">
                <div class="main_content_1">
                    <div class="main_content_1_big">
                        <div>
                            <a href="#"><img src="images/qc1.png"></a>
                            <h2>
                                <a href="#"><?= $postsHot->pos_title ?></a>
                            </h2>
                            <p><?= $postsHot->pos_description ?></p>
                        </div>
                    </div>
                    <div class="main_content_1_small">
                        <div>
                            <a href="#"><img src="images/qc2.jpg"></a>
                            <h2>
                                <a href="#"><?= $postsHot->hotSmall->pos_title ?></a>
                            </h2>
                            <span><?= $postsHot->hotSmall->pos_description ?></span>
                        </div>
                    </div>
                </div>
                <div class="main_content_2">
                    <div>
                        <ul class="owl-carousel owl-theme item-carousel">
                            <?php foreach ($categoriesHot->posts as $item) { ?>
                            <li class="item">
                                <a href="#"><img src="images/qc3.jpg"></a>
                                <h3>
                                    <a href="#"><?= $item->pos_title ?></a>
                                </h3>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="main_content_3">
                    <ul>
                        <?php foreach($posts as $item) { ?>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc6.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title">
                                    <a href="#"><?= $item->pos_title ?></a>
                                </h4>
                                <div class="item_meta">
                                    <a href="#"><?= $item->cat_name ?></a>
                                    -
                                    <span><?= $item->pos_created_at ?></span>
                                </div>
                                <span class="item_sapo">
                                    <?= $item->pos_description ?>
                                </span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <?php } ?>
                        <div class="content_extra">
                            <li class="content_3_trendAd">
                                <div class="read_more_and_brands_stuff">
                                    <div class="read_more" {{--style="max-height: 575px; height: 575px;"--}}>
                                        <div class="tab">ĐÁNG CHÚ Ý</div>
                                        <div class="item first">
                                            <div class="ava">
                                                <a href="#">
                                                    <img src="images/extra1.jpg">
                                                </a>
                                            </div>
                                            <h3>
                                                <a href="#">
                                                    <?= $postsHot->hotSmaller->pos_title ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <?php foreach ($categoriesHot->posts as $item) { ?>
                                        <div class="item">
                                            <h3>
                                                <a href="#">
                                                    <?= $item->pos_title ?>
                                                </a>
                                            </h3>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="marketing_beats">
                                        <div class="tab">
                                            <a href="#" class="tabTitle">MYGENK</a>
                                            <a href="#" class="tabViewMore"></a>
                                        </div>
                                        <div class="list_marketing">
                                            <ul>
                                                <?php foreach ($categoriesHot->hot2->posts as $item) { ?>
                                                <li class="item" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">
                                                            <?= $item->pos_title ?>
                                                        </a>
                                                    </h3>
                                                    <a class="item_image" href="#"><img src="images/extra2.jpg"></a>
                                                </li>
                                                <?php } ?>
                                                <?php foreach ($categoriesHot->hot2->hot3->posts as $item) { ?>
                                                <li class="item after" style="display: list-item;">
                                                    <h3>
                                                        <a href="#">
                                                            <?= $item->pos_title ?>
                                                        </a>
                                                    </h3>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc8.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">FPT Shop chính thức ngưng bán hàng điện máy</a></h4>
                                <div class="item_meta">
                                    <a href="#">Tin ICT</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										FPT Shop ngưng bán mặt hàng điện máy sau một thời gian thử nghiệm hợp tác với đối tác Nguyễn Kim.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc8.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">FPT Shop chính thức ngưng bán hàng điện máy</a></h4>
                                <div class="item_meta">
                                    <a href="#">Tin ICT</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										FPT Shop ngưng bán mặt hàng điện máy sau một thời gian thử nghiệm hợp tác với đối tác Nguyễn Kim.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc8.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">FPT Shop chính thức ngưng bán hàng điện máy</a></h4>
                                <div class="item_meta">
                                    <a href="#">Tin ICT</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										FPT Shop ngưng bán mặt hàng điện máy sau một thời gian thử nghiệm hợp tác với đối tác Nguyễn Kim.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc8.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">FPT Shop chính thức ngưng bán hàng điện máy</a></h4>
                                <div class="item_meta">
                                    <a href="#">Tin ICT</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										FPT Shop ngưng bán mặt hàng điện máy sau một thời gian thử nghiệm hợp tác với đối tác Nguyễn Kim.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc8.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">FPT Shop chính thức ngưng bán hàng điện máy</a></h4>
                                <div class="item_meta">
                                    <a href="#">Tin ICT</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										FPT Shop ngưng bán mặt hàng điện máy sau một thời gian thử nghiệm hợp tác với đối tác Nguyễn Kim.
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <div class="content_extra_2">
                            <div class="mostview_and_beat read_more_and_brands_stuff">
                                <div class="mostview">
                                    <div class="tab">Đọc nhiều</div>
                                    <ul>
                                        <?php foreach ($categoriesHot->posts as $item) { ?>
                                        <li>
                                            <a class="item_images" href="#"><img src="images/extra3.jpg"></a>
                                            <h3>
                                                <a href="#">
                                                    <?= $item->pos_title ?>
                                                </a>
                                            </h3>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="brands">
                                    <div class="tab">Cũ mà hay</div>
                                    <div class="other">
                                        <?php foreach ($categoriesHot->hot2->posts as $item) { ?>
                                        <h3 class="first">
                                            <a href="#">
                                                <?= $item->pos_title ?>
                                            </a>
                                        </h3>
                                        <?php } ?>
                                        <?php foreach ($categoriesHot->hot2->hot3->posts as $item) { ?>
                                        <h3>
                                            <a href="#">
                                                <?= $item->pos_title ?>
                                            </a>
                                        </h3>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc9.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">'Đầu gấu' là thế, nhưng vì sao loài mèo hễ nhìn thấy dưa chuột là sợ khiếp vía?</a></h4>
                                <div class="item_meta">
                                    <a href="#">Khám phá</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Những video hài hước quay cảnh các chú mèo phản ứng sợ hãi trước dưa chuột đã làm dấy lên thắc mắc về...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc9.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">'Đầu gấu' là thế, nhưng vì sao loài mèo hễ nhìn thấy dưa chuột là sợ khiếp vía?</a></h4>
                                <div class="item_meta">
                                    <a href="#">Khám phá</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Những video hài hước quay cảnh các chú mèo phản ứng sợ hãi trước dưa chuột đã làm dấy lên thắc mắc về...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc9.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">'Đầu gấu' là thế, nhưng vì sao loài mèo hễ nhìn thấy dưa chuột là sợ khiếp vía?</a></h4>
                                <div class="item_meta">
                                    <a href="#">Khám phá</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Những video hài hước quay cảnh các chú mèo phản ứng sợ hãi trước dưa chuột đã làm dấy lên thắc mắc về...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc9.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">'Đầu gấu' là thế, nhưng vì sao loài mèo hễ nhìn thấy dưa chuột là sợ khiếp vía?</a></h4>
                                <div class="item_meta">
                                    <a href="#">Khám phá</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Những video hài hước quay cảnh các chú mèo phản ứng sợ hãi trước dưa chuột đã làm dấy lên thắc mắc về...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <li class="content_3_item">
                            <div class="item_image">
                                <a href="#">
                                    <img src="images/qc9.jpg" width="250" height="155">
                                </a>
                            </div>
                            <div class="item_info">
                                <h4 class="item_title"><a href="#">'Đầu gấu' là thế, nhưng vì sao loài mèo hễ nhìn thấy dưa chuột là sợ khiếp vía?</a></h4>
                                <div class="item_meta">
                                    <a href="#">Khám phá</a>
                                    -
                                    <span>1 giờ trước</span>
                                </div>
                                <span class="item_sapo">
										Những video hài hước quay cảnh các chú mèo phản ứng sợ hãi trước dưa chuột đã làm dấy lên thắc mắc về...
									</span>
                                <div class="item_relate_wrap"></div>
                            </div>
                        </li>
                        <div class="content_extra_3">
                            <div class="dontmiss">
                                <p class="title-box">Đừng bỏ lỡ</p>
                                <ul>
                                    <?php foreach ($categoriesHot->hot2->hot3->posts as $item) { ?>
                                    <li>
                                        <div class="dontmiss_img">
                                            <a href="#"><img src="images/extra4.jpg"></a>
                                        </div>
                                        <div class="dontmiss_text">
                                            <h4>
                                                <a href="#">
                                                    <?= $item->pos_title ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </li>
                                    <?php } ?>
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
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700: Laptop gaming quái thú vạn người mê!</a></h4>
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
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700: Laptop gaming quái thú vạn người mê!</a></h4>
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
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700: Laptop gaming quái thú vạn người mê!</a></h4>
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
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700: Laptop gaming quái thú vạn người mê!</a></h4>
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
                                <h4 class="item_title"><a href="#">Bộ ba Predator Helios 300, Triton 500 và Helios 700: Laptop gaming quái thú vạn người mê!</a></h4>
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
                    <div class="wrapperbtn">
                        <a href="#" class="btnviewmore">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="ads">
                <div class="ads_1">
                    <div class="ads_1_banner">
                        <img src="assets/images/ads-1.jpg">
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
</div>
