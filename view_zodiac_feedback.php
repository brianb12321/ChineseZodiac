<head>
    <link rel="stylesheet" href="site.css">
    <style>
        table td {
            padding-right: 20px;
        }
    </style>
</head>

<h1>List of All Public feedback</h1>
<?php
include_once("./Includes/inc_connect.php");
if($DBConnect === FALSE) {
    echo "<p>Cannot connect to the database right now. Please try again later.</p>";
    die();
}
echo "<table>";
echo <<<EOD
<tr>
    <th>Date</th>
    <th>Time</th>
    <th>Name</th>
    <th>Message</th>
</tr>
EOD;
$Query = "SELECT * FROM zodiacfeedback WHERE public_message='Y';";
$QueryResult = $DBConnect->query($Query);
if($QueryResult === FALSE) {
    echo "<p>Connot get public messages. Please try again klater.</p>";
    $DBConnect->close();
    die();
}
while(($row = mysqli_fetch_assoc($QueryResult)) != null) {
    echo "<tr>";
    echo "<td>{$row["message_date"]}</td>";
    echo "<td>{$row["message_time"]}</td>";
    echo "<td>{$row["sender"]}</td>";
    echo "<td>{$row["message"]}</td>";
    echo "</tr>";
}
$QueryResult->free_result();
$DBConnect->close();
?>