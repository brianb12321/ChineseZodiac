<?php
session_start();
require_once("class_EventCalendar.php");
if(class_exists("EventCalendar")) {
    if(isset($_SESSION["currentCalendar"])) {
        $Calendar = unserialize($_SESSION["currentCalendar"]);
    }
    else {
        $Calendar = new EventCalendar();
    }
}
else {
    $Calendar = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <title>Event Details</title>
</head>
<body>
    <?php
if(isset($_GET["EventID"])) {
    $Calendar->getEventDetails($_GET["EventID"]);
}
else {
    echo "<p>You must specify an event ID in a get request in order to get event details.</p>";
}
echo "<a href='EventCalendar.php?PHPSESSID=" . session_id() . "'><button>Return To Calendar</button></a>\n";
    ?>
</body>
</html>