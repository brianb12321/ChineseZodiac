<head>
    <link rel="stylesheet" href="site.css">
</head>

<?php
if(isset($_POST["Submit"])) {
    $Sender = $_POST["sender"];
    if(empty($Sender)) {
        echo "<p>Field \"Your Name\" must not be empty.</p>";
        die();
    }
    $Message = $_POST["message"];
    if(empty($Message)) {
        echo "<p>Field \"Your Message\" must not be empty.</p>";
        die();
    }
    $Public = isset($_POST["public_message"]) ? "Y" : "N";
    include("includes/inc_connect.php");
    if($DBConnect === FALSE) {
        echo "<p>There was an error connecting to the database</p>";
        die();
    }
    $DBTable = "zodiacfeedback";
    date_default_timezone_set("America/Chicago");
    $CurrentDate = date("Y-m-d");
    $CurrentTime = date("h:i A", time());
    $InsertQuery = $DBConnect->prepare("INSERT INTO $DBTable VALUES('$CurrentDate', '$CurrentTime', ?, ?, ?);");
    $InsertQuery->bind_param("sss", $Sender, $Message, $Public);
    $InsertQuery->execute();
    if($InsertQuery->affected_rows > 0) {
        echo "<p>Thank you for submitting feedback!</p>";
    }
    else {
        echo "<p>There was an error submitting your feedback to the database.</p>";
    }
    $DBConnect->close();
}
else {
    echo "<p>This file should not be directly accessed.</p>";
}
?>