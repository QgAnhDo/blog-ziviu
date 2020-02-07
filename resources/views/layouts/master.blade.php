<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi">
<head>
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title >@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description" content="Đây là 1 trang blog Ziviu chuyên tổng hợp các tin tức liên quan nhà hàng, khách sạn, địa điểm du lịch, v.v... Mục đích là để cho người dùng được cập nhật thông tin một cách chính xác và nhanh chóng nhất">
    <meta name="keywords" content="trip247, ziviu, nhà hàng, khách sạn, địa điểm, so sánh giá, tin tức, du lịch">
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="article" />
    @yield('og:url')
    @yield('og:image')
    <meta property="og:description" itemprop="description" content="Đây là 1 trang blog Ziviu chuyên tổng hợp các tin tức liên quan nhà hàng, khách sạn, địa điểm du lịch, v.v... Mục đích là để cho người dùng được cập nhật thông tin một cách chính xác và nhanh chóng nhất" />
    <meta property="og:url" itemprop="url" content="{{asset('')}}" />
    <meta name="twitter:card" content="{{asset('')}}" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />
    <meta name="robots" content="noindex"/>
    <link rel="canonical" href="{{asset('')}}" />
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl_carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl_carousel/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index_layout/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive/style-responsive.min.css">
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
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/main-carousel.js"></script>
<script type="text/javascript" src="assets/js/menu_header.min.js"></script>
<?php
$schema_data = [
    "@context" => "http://schema.org",
    "@type" => "WebSite",
    "url" => asset(''),
    "name" => 'Ziviu - trang tin tức cập nhật 24h',
    "description" => 'Đây là 1 trang blog Ziviu chuyên tổng hợp các tin tức liên quan nhà hàng, khách sạn, địa điểm du lịch, v.v... Mục đích là để cho người dùng được cập nhật thông tin một cách chính xác và nhanh chóng nhất',
    // "potentialAction" => [
    //     "@type" => "SearchAction",
    //     "target" => "http://localhost:9088/khach-san/search?&q={query}",
    //     "query-input" => "required name=query"
    // ]
];
?>
<script type="application/ld+json"><?= json_encode($schema_data) ?></script>
</body>
</html>
