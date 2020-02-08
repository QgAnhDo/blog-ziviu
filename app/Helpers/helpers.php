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
