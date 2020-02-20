<div id="header">
    <div class="genk_bottom_header">
        <div class="menu">
            <div class="container">
                <div class="menu_div">
                    <a href="/" class="genk_logo"><img src="assets/images/logo-1.png" alt="Trang chủ"></a>
                    <ul class="menu_list">
                        @foreach($categories as $item)
                            <li>
                                <a href="{{$item->getLinkCategory()}}">
                                    {{$item->cat_name}}
                                </a>
                            </li>
                        @endforeach
                        <li class="expand_icon">
                            <a href="#" class="menu_icon" onclick="">
                                <i class="fa fa-bars" id="menu-bar" style="display: block"></i>
                                <i class="fa fa-times" id="menu-close" style="display: none"></i>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="search_icon" id="btnSearch"><img src="assets/images/magnifying-glass.png" alt="search"></a>
                    <form action="{{route('search.index')}}" method="GET">
                        <input class="searchbox showsearch" type="text" name="name" value="{{isset($_GET['name']) ? $_GET['name'] :''}}" placeholder="Nhập nội dung tìm kiếm ...">
                    </form>
                </div>
            </div>
        </div>
        <div class="menu_expand" id="menuExpand" style="display: none;">
            <div class="menu_clear">
                <div class="container">
                    <ul class="menu_expand_list">
                        @foreach($categories as $item)
                        <li class="menu_expand_item">
                            <ul class="submenu_expand_list">
                                <li class="submenu_expand_item cate">
                                    <a href="{{$item->getLinkCategory()}}">
                                        {{$item->cat_name}}
                                    </a>
                                </li>
                                @foreach ($item->cat_child as $value)
                                <li class="submenu_expand_item">
                                    <a href="{{$value->getLinkCategory()}}">
                                        {{$value->cat_name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ads_header">
        <div class="container">
            <div>
                <a href="https://www.google.com/search?q=trip247.net" target="_blank"><img src="assets/images/ads-1.jpg" alt="head_banner"></a>
            </div>
        </div>
    </div>
</div>
