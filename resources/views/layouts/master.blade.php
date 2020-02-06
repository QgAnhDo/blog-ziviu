<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>Trang thông tin dành cho các tín đồ công nghệ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/index_layout/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive/style-responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl_carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl_carousel/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/main-carousel.js"></script>
    <script type="text/javascript" src="assets/js/menu-icon-change.js"></script>
    <script type="text/javascript" src="assets/js/searchbox.js"></script>
    <script type="text/javascript" src="assets/js/scroll-to-top.js"></script>
    <script type="text/javascript" src="assets/js/sticky-menu.js"></script>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>

<?php
require('../resources/views/layouts/header.blade.php');
echo $dataShow['view'];
require('../resources/views/layouts/footer.blade.php');
?>

<div id="scroller" align="center">
    <p id="back-top" align="center">
        <a href="#top"><span></span></a>
    </p>
</div>
</body>
</html>
