<?php

if(isset($_GET["section"])) {
    switch($_GET["section"]) {
        case "zodiac":
            include("Includes/inc_chinese_zodiac.php");
            break;
        case "php":
        default:
            include("Includes/inc_php_info.php");
            break;
    }
}
else {
    include("Includes/inc_php_info.php");
}
?>