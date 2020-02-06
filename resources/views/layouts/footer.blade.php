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
                    <b><?= $configuration->con_site_title ?></b>
                </p>
                <p>
                    <?= $configuration->con_address ?>
                    <br>
                    Hotline: <?= $configuration->con_hotline ?> (Giờ hành chính)
                    <br>
                    <?= $configuration->con_meta_keywords ?>
                    <br>
                    <?= $configuration->con_meta_description ?>
                </p>
            </div>
            <div class="gfwbf_right">
                <p>
                    Email:
                    <a href="#"><?= $configuration->con_admin_email ?></a>
                    <br>
                    <br>
                    Mạng xã hội:
                    <br>
                    <a href="<?= $configuration->con_facebook ?>" target="_blank"><img src="assets/images/icon_fb.png"></a>
                    <a href="<?= $configuration->con_youtube ?>" target="_blank"><img src="assets/images/icon_youtube.png"></a>
                    <a href="<?= $configuration->con_google_plus ?>" target="_blank"><img src="assets/images/icon_insta.png"></a>
                </p>
            </div>
        </div>
    </div>
</div>
