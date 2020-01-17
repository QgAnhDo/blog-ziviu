<div id="header">
    <?php /*<div class="genk_top_header">
        <div class="container">
            <div class="menu_channel">
                <div class="test_new_version">
                    <a href="#">Đăng nhập</a>
                    /
                    <a href="#">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>*/ ?>
    <div class="genk_bottom_header">
        <div class="menu">
            <div class="container">
                <div class="menu_div">
                    <a href="/" class="genk_logo"><img src="assets/images/logo-1.png"></a>
                    <ul class="menu_list">
                        <?php foreach($categories as $item) { ?>
                            <li>
                                <a href="<?= route('categories.index', ['slug'=> $item->cat_slug, 'id'=> $item->cat_id]) ?>">
                                    <?= $item->cat_name ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="expand_icon">
                            <a href="#" class="menu_icon" onclick="">
                                <i class="fa fa-bars" id="menu-bar" style="display: block"></i>
                                <i class="fa fa-times" id="menu-close" style="display: none"></i>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="search_icon" id="btnSearch"><img src="assets/images/icon-search.png"></a>
                    <form action="<?= route('search.index') ?>" method="GET">
                        <input class="searchbox showsearch" type="text" name="name" value="<?= isset($_GET['name']) ? $_GET['name'] :'' ?>" placeholder="Nhập nội dung tìm kiếm ...">
                    </form>
                </div>
            </div>
        </div>
        <div class="menu_expand" id="menuExpand" style="display: none;">
            <div class="menu_clear">
                <div class="container">
                    <ul class="menu_expand_list">
                        <?php foreach($categories as $item) { ?>
                        <li class="menu_expand_item">
                            <ul class="submenu_expand_list">
                                <li class="submenu_expand_item cate">
                                    <a href="<?= route('categories.index', ['slug'=> $item->cat_slug, 'id'=> $item->cat_id]) ?>">
                                        <?= $item->cat_name ?>
                                    </a>
                                </li>
                                <?php foreach ($item->cat_child as $value) { ?>
                                <li class="submenu_expand_item">
                                    <a href="<?= route('categories.index', ['slug'=> $value->cat_slug, 'id'=> $value->cat_id]) ?>">
                                        <?= $value->cat_name ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ads_header">
        <div class="container">
            <div>
                <a href="https://trip247.net/" target="_blank"><img src="assets/images/ads-1.jpg"></a>
            </div>
        </div>
    </div>
</div>
