<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
<head>
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title >@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description" content="Blog.Ziviu là trang blog chính thức của Trip247.net, chuyên tổng hợp các tin tức chính từ Trip247 như nhà hàng, khách sạn... và các tin tức lớn nhỏ khác liên quan đến danh mục của trang web. Mục đích là để cho người dùng được cập nhật thông tin một cách chính xác và nhanh chóng nhất">
    <meta name="keywords" content="trip247, ziviu, nhà hàng, khách sạn, địa điểm, so sánh giá, tin tức">
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="image/jpeg" />
    <meta property="og:url" content="{{asset('')}}" />
    <meta property="og:image" content="assets/images/logo-1.png" />
    <meta property="og:description" itemprop="description" content="ng cấp thông tin từ các tin tức của Trip247 như nhà hàng, khách sạn, v.v..." />
    <meta property="og:url" itemprop="url" content="{{asset('')}}" />
    <meta name="twitter:card" content="trip247" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />
    <meta name="robots" content="index, follow"/>
    <link rel="canonical" href="http://blog.ziviu.com/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index_layout/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive/style-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl_carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl_carousel/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
</head>
<body>

@include('layouts.header')
@yield('content')
@include('layouts.footer')

<div id="scroller" align="center">
    <p id="back-top" align="center">
        <a href="#top"><span></span></a>
    </p>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/main-carousel.js"></script>
<script type="text/javascript" src="assets/js/menu_header.min.js"></script>
</body>
</html>
