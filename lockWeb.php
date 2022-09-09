<?php
function lockWebGetURL()
{
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    $ext = (strpos($pageURL, "?p")) ? "?" : "&";
    $pageURL = explode($ext . "p=", $pageURL);
    return $pageURL[0];
}
function lockWebRedirect($url = '', $response = null)
{
    header("location:$url", true, $response);
    exit();
}
function lockWebMakeDate($time, $dot = '.', $lang = 'vi', $f = false)
{
    $str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y", $time) : date("m{$dot}d{$dot}Y", $time);
    if ($f) {
        $thu['vi'] = array(
            'Chủ nhật',
            'Thứ hai',
            'Thứ ba',
            'Thứ tư',
            'Thứ năm',
            'Thứ sáu',
            'Thứ bảy'
        );
        $thu['en'] = array(
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        );
        $str = $thu[$lang][date('w', $time)] . ', ' . $str;
    }
    return $str;
}

$todayPage = strtotime(lockWebMakeDate(time(), '-'));
$intTimeLock = strtotime('19-09-2022');

if ($intTimeLock < $todayPage) {
    $stringUrl = lockWebGetURL();
    $arrayUrl = explode('.com/', $stringUrl);

    if ($stringUrl == "http://sunroaster.com.vn/gio-hang") {

        if ($arrayUrl[1] == '') {
            lockWebRedirect('http://sunroaster.com.vn');
        }
    }
}
