<?php

function getTimeDuration($subtract)
{
    $year = floor($subtract/(86400*365));
    $month = floor($subtract/(86400*30));
    $day = floor($subtract/86400);

    $hour = floor($subtract/(86400/24));
    $minute = floor($subtract/(86400/1440));
    $second = floor($subtract/(86400/86400));

    if($second > 0) {
        $newdate = $second . ' giây trước';
    }
    if($minute > 0) {
        $newdate = $minute . ' phút trước';
    }
    if($hour > 0) {
        $newdate = $hour . ' giờ trước';
    }
    if($day > 0) {
        $newdate = $day . ' ngày trước';
    }
    if($month > 0) {
        $newdate = $month . ' tháng trước';
    }
    if($year > 0) {
        $newdate = $year . ' năm trước';
    }

    return $newdate;
}

function parse_image($folder, $size, $fileName)
{
    if ($fileName == "") {
        return "";
    } else {
        $explode = explode('/', $fileName);
        $source = url('/uploads/' . $folder . '/' . $size . '/' . $explode[0] . '/' . $explode[1] . '/' . $explode[2] . '/' . $fileName);
        return $source;
    }
}

function parse_image_no_explode($folder, $size, $fileName)
{
    if ($fileName == "") {
        return "";
    } else {
        $source = url('/uploads/' . $folder . '/' . $size . '/' . $fileName);
        return $source;
    }
}

function parse_image_by_file($folder, $fileName)
{
    if ($fileName == "") {
        return "";
    } else {
        $source = asset('/storage/uploads/' . $folder . '/' . $fileName);
        return $source;
    }
}

function create_folder_full_permissions($path)
{
    // edit:ducpanda
    // chmod folder with 0777
    $date_current = date('Y/m/d', time());
    $dir = $path;
    $day_current = substr($date_current, 8, 2);
    $month_current = substr($date_current, 5, 2);
    $year_current = substr($date_current, 0, 4);

    // Tạo folder năm hiện tại
    if (!is_dir($dir . $year_current)) {
        mkdir($dir . '/' . $year_current . '/', 0777, true);
    }

    // Tạo folder tháng hiện tại
    if (!is_dir($dir . $year_current . '/' . $month_current)) {
        mkdir($dir . $year_current . '/' . $month_current . '/', 0777);
    }

    // Tạo folder ngày hiện tại
    if (!is_dir($dir . $year_current . '/' . $month_current . '/' . $day_current)) {
        mkdir($dir . $year_current . '/' . $month_current . '/' . $day_current . '/', 0777);
    }
}

function get_name_image($url, $pathFile)
{
    $sExtension = substr($url['name'], (strrpos($url['name'], ".") + 1));
    $sExtension = strtolower($sExtension);

    if ($url['size'] / 1024 / 1024 < 10) {
        $extensions = array('jpg', 'png', 'gif', 'jpeg', 'PNG', 'JPG', 'JPEG', 'GIF');
        if (in_array($sExtension, $extensions)) {
            $filename = generate_name($url['name']);
            $path = $_SERVER['DOCUMENT_ROOT'] . $pathFile . date("Y/m/d", time()) . '/' . $filename;
            move_uploaded_file($url['tmp_name'], $path);
            return $filename;
        } else {
            return '';
        }
    }
    return '';
}

function generate_name($filename)
{
    $name = date("Y_m_d_") . transformUrlImage($filename);
    return $name;
}

function transformUrlImage($str)
{
    $str = clearSpecialStr($str);
    $str = preg_replace("/ /", '-', $str);
    $str = preg_replace("/([?]|{?})/", '', $str);
    $str = preg_replace("/\W/", '-', $str);
    $str = preg_replace("/-+/", '-', $str);
    $str = str_replace('/', '', $str);
    $str = trim($str, '-');
    return iconv('UTF-8', "ASCII//IGNORE", $str);
}

function clearSpecialStr($str)
{
    $str = mb_strtolower($str);
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    return $str;
}

function upload_img($folder, $fileName)
{
    create_folder_full_permissions($_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $folder . "/default/");

    $filename = $fileName;
    $image = get_name_image($filename, '/uploads/' . $folder . '/default/');
    return $image;
}
