<?php
include("inc_connect.php");
if(empty($_COOKIE["visits"])) {
    $DBConnect->query("UPDATE visit_counter SET counter = counter + 1 WHERE id = 1");
    $QueryResult = $DBConnect->query("SELECT counter FROM visit_counter WHERE id = 1");
    if(($Row = $QueryResult->fetch_assoc()) !== FALSE) {
        $Visitors = $Row["counter"];
    }
    else {
        $Visitors = 1;
    }
    setcookie("visits", $Visitors, time() + (60 * 60 * 24));
}
else {
    $Visitors = $_COOKIE["visits"];
}
?>