<?php
$DBName = "chinese_zodiac";
$DBConnect = new mysqli("localhost", "root", "");
if($DBConnect->connect_errno) {
    echo "<p>Unable to connect to the database server.</p>"
        . "<p>Error code " . $DBConnect->errno
        . ": " . $DBConnect->error . "</p>";

    $DBConnect = FALSE;
}
else {
    $DB = $DBConnect->select_db($DBName);
    if ($DB === FALSE) {
        echo "<p>Unable to connect to the database server"
            . "<p>Error code " . $DBConnect->errno
            . ": " . $DBConnect->error . "</p>";
        $DBConnect->close();
        $DBConnect = FALSE;
    }
}
?>