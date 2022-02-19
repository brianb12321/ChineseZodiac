<?php
session_start();
$SurveyQuestions = array(
    1 => "Was the navigation straightfoward and did all the links work?",
    2 => "Was the selection of background color, font color, and font size appropriate?",
    3 => "Were the images appropriate and did they complement the web content?",
    4 => "Were the descriptions of PHP program complete and easy to understand?",
    5 => "Was the PHP code structured properly and well commented?"
);
$QuestionCount = count($SurveyQuestions);
if(isset($_SESSION["CurrentQuestion"])) {
    if($_SESSION["CurrentQuestion"] > 0 && isset($_POST["response"])) {
        $_SESSION["Responses"][$_SESSION["CurrentQuestion"]] = $_POST["response"];
    }
    ++$_SESSION["CurrentQuestion"];
}
else {
    $_SESSION["CurrentQuestion"] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <title>Web Survey</title>
</head>
<body>
    <h1>Web Survey</h1>
    <?php
if($_SESSION["CurrentQuestion"] == 0) {
    ?>
    <p>
        Thank you for taking the time to explore the Chinese Zodiac site. Your feedback is valuable in making this a better and more enjoyable experience.
        Please take some time to fill out this survey.
    </p>
    <?php
}
else if($_SESSION["CurrentQuestion"] > $QuestionCount) {
    ?>
    <p>Thank you for taking the survey. Your feedback is greatly appreciated</p>
    <p>Here were your responses:</p>
    <?php
    echo "<ol>";
    foreach($SurveyQuestions as $QNumber => $Question) {
        echo "<li>";
        echo "<p>$SurveyQuestions[$QNumber]</p>";
        echo "<p>Your response was:</br> {$_SESSION["Responses"][$QNumber]}</p>";
        echo "</li>";
    }
    echo "</ol>";
    echo "<a href='index.php'><button>Return Home</button></a>";
}
else {
    echo "<p>Question {$_SESSION["CurrentQuestion"]}: {$SurveyQuestions[$_SESSION["CurrentQuestion"]]}</p>\r\n";
}

if($_SESSION["CurrentQuestion"] <= $QuestionCount) {
    echo "<form method='POST' action='web_survey.php'>\r\n";
    echo "<input type='hidden' name='PHPSESSID' value='" . session_id() . "' />\r\n";
    if($_SESSION["CurrentQuestion"] > 0) {
        echo "<p><input type='radio' name='response' value='Exceeds Expectations' />Exceeds Expectations<br/>\r\n";
        echo "<input type='radio' name='response' value='Meets Expectations' checked='checked' />Meets Expectations<br/>\r\n";
        echo "<input type='radio' name='response' value='Below Expectations' />Below Expectations</p>\r\n";
    }
    echo "<button type='submit' name='submit'>";
    if($_SESSION["CurrentQuestion"] == 0) {
        echo "Start the Survey";
    }
    else if($_SESSION["CurrentQuestion"] == $QuestionCount) {
        echo "Finished";
    }
    else {
        echo "Next Question";
    }
    echo "</button>\r\n";
    echo "</form>";
}
    ?>
</body>
</html>