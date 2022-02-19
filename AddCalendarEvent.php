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
    <title>Add Calendar Event</title>
</head>
<body>
    <h1>Add Calendar Event</h1>
    <?php
if(isset($_POST["EventDate"]) && isset($_POST["EventTitle"]) && isset($_POST["EventDesc"])) {
    if($Calendar === null) {
        echo "<p>There was an error creating the EventCalendar object.</p>\n";
    }
    else {
        $Calendar->addEvent(stripslashes($_POST["EventDate"]), stripslashes($_POST["EventTitle"]), stripslashes($_POST["EventDesc"]));
        $_SESSION["currentCalendar"] = serialize($Calendar);
    }
}
    ?>
    <form action="AddCalendarEvent.php?PHPSESSID=<?php echo session_id(); ?>" method="POST">
        <p>Date (yyyy-mm-dd): <input type="text" name="EventDate" required /> required</p>
        <p>Title: <input type="text" name="EventTitle" required /> required</p>
        <p>Desc: <input type="text" name="EventDesc" required /> required</p>
        <p><button type="submit" name="submit">Save Event</button></p>
    </form>
    <a href="EventCalendar.php?PHPSESSID=<?php echo session_id(); ?>">View The Event Calendar</a>
</body>
</html>