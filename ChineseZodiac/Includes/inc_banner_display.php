<?php
$BannerArray = array(
    "Images/Banner1.png",
    "Images/Banner2.png",
    "Images/Banner2.png",
    "Images/Banner4.png",
    "Images/Banner5.png"
);
$BannerCount = count($BannerArray);
if(empty($_COOKIE["lastbanner"])) {
    $BannerIndex = random_int(0, $BannerCount - 1);
}
else {
    $BannerIndex = $_COOKIE["lastbanner"];
    $BannerIndex = (++$BannerIndex) % $BannerCount;
}
setcookie("lastbanner", $BannerIndex, time() + (60 * 60 * 24 * 7));
?>