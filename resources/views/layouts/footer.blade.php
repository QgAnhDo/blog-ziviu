<div id="footer">
    <div class="top_footer">
        <div class="container">
            <div class="gfw_top_wrapper">
                <a href="#"><img src="assets/images/logo-1.png"></a>
            </div>
            <div class="gfw_bottom_wrapper">
                <ul>
                    <?php foreach ($categories as $item) { ?>
                    <li>
                        <a href="<?= route('categories.index', ['slug'=> $item->cat_slug, 'id'=> $item->cat_id]) ?>">
                            <?= $item->cat_name ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_footer">
        <div class="container">
            <div class="gfwbf_left">
                <p>
                    Chịu trách nhiệm quản lý nội dung: Bà Nguyễn Bích Minh
                    <br>
                    Hà Nội: Tầng 20, Tòa nhà Center Building - Hapulico Complex, Số 1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội.
                    <br>
                    Email:
                    <a href="#" rel="nofollow">info@genk.vn</a>
                    <br>
                    Điện thoại: 024.73095555, máy lẻ 62374
                    <br>
                    VPĐD tại TP.HCM: Tầng 4, Tòa nhà 123
                    <br>
                    Võ Văn Tần, Phường 6, Quận 3, Tp. Hồ Chí Minh
                    <br>
                </p>
                <p>
                    <b>© Copyright 2010 - 2019 - Công ty Cổ phần VCCorp</b>
                    <br>
                    Tầng 17, 19, 20, 21 Toà nhà Center Building - Hapulico Complex, Số 1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội.
                    <br>
                    Trang tin điện tử trên internet: Giấy phép số 460/GP-TTĐT do Sở Thông tin và Truyền thông Hà Nội cấp ngày 03/02/2016
                    <br>
                </p>
            </div>
            <div class="gfwbf_right">
                <h4>Liên hệ quảng cáo</h4>
                <span></span>
                <p>
                    Hotline hỗ trợ quảng cáo: 0942 86 11 33
                    <br>
                    <br>
                    Email:
                    <a href="#" rel="nofollow">giaitrixahoi@admicro.vn</a>
                    <br>
                    Hỗ trợ & CSKH: Admicro
                    <br>
                    Address: Tầng 20, Tòa nhà Center Building - Hapulico Complex, Số 1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội.
                    <br>
                    <br>
                </p>
            </div>
        </div>
    </div>
</div>
