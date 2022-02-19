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
    <title>Event Calendar</title>

    <style>
        h1 {
            width: 50%;
            text-align: center;
            margin: auto;
        }
        table {
            width: 50%;
            margin: auto;
        }
        table tr td {
            width: 200px;
            text-align: center;
        }
        div {
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Event Calendar</h1>
    <?php
if($Calendar === null) {
    echo "<p>There was an error creating the EventCalendar object.</p>\n";
}
else {
    if(!isset($_GET["Year"]) || !isset($_GET["Month"])) {
        $_GET["Year"] = date("Y");
        $_GET["Month"] = date("n");
    }
    $Calendar->getMonthlyCalendar($_GET["Year"], $_GET["Month"]);
}
    ?>
    <div>
    <a href="AddCalendarEvent.php?PHPSESSID=<?php echo session_id(); ?>">Add an event to the calendar</a>
    <br/><a href='Index.php'><button>Return Home</button></a>
    </div>
</body>
</html>