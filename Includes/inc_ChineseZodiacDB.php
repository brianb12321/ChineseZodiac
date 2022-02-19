<?php
$ErrorMsgs = array();
$DBConnect = @new mysqli("localhost", "root", "", "chinese_zodiac");
if($DBConnect->connect_error) {
    $ErrorMsgs[] = "The database server is not available. Connect error is " . $DBConnect->connect_errno . " " . $DBConnect->connect_error . ".";
}
?>