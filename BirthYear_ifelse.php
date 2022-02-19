<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <title>Birth Year IfElse</title>
</head>
<body>
    <?php
if(isset($_POST["Submit"])) {
    //Begin the calendar at 1900.
    $startingYear = 1900;
    $enteredYear = $_POST["BirthYear"];
    $index = ($enteredYear - $startingYear) % 12;

    if($index === 0) {
        $signName = "Rat";
        $signImage = "Images/Rat.jpg";
    }
    else if($index === 1) {
        $signName = "Ox";
        $signImage = "Images/Ox.png";
    }
    else if($index === 2) {
        $signName = "Tiger";
        $signImage = "Images/Tiger.jpg";
    }
    else if($index === 3) {
        $signName = "Rabbit";
        $signImage = "Images/Rabbit.jpg";
    }
    else if($index === 4) {
        $signName = "Dragon";
        $signImage = "Images/Dragon.jpg";
    }
    else if($index === 5) {
        $signName = "Snake";
        $signImage = "Images/Snake.png";
    }
    else if($index === 6) {
        $signName = "Horse";
        $signImage = "Images/Horse.png";
    }
    else if($index === 7) {
        $signName = "Goat";
        $signImage = "Images/Goat.jpg";
    }
    else if($index === 8) {
        $signName = "Monkey";
        $signImage = "Images/Monkey.png";
    }
    else if($index === 9) {
        $signName = "Rooster";
        $signImage = "Images/Rooster.png";
    }
    else if($index === 10) {
        $signName = "Dog";
        $signImage = "Images/Dog.jfif";
    }
    else if($index === 11) {
        $signName = "Pig";
        $signImage = "Images/Pig.jfif";
    }
    //Save the file and retrieve statistics.
    define("YEAR_COUNT_DIR", "statistics");
    if(!file_exists(YEAR_COUNT_DIR)) {
        mkdir(YEAR_COUNT_DIR);
    }
    if(!is_readable(YEAR_COUNT_DIR)) {
        echo "<p>Directory is not readable.</p>";
        die();
    }

    $fileName = YEAR_COUNT_DIR . "/$enteredYear.txt";
    $numberOfEntries = 0;
    if(file_exists($fileName)) {
        $numberOfEntries = file_get_contents($fileName);
        if(!is_numeric($numberOfEntries)) {
            echo "<p>File \"$fileName\" is corrupt.</p>";
            die();
        }
    }
    //Update the file and close.
    $numberOfEntries++;
    file_put_contents($fileName, $numberOfEntries);

    //Display the data.
    echo "<p>You were born under the sign of the <strong>$signName</strong></p>";
    echo "<img src=\"$signImage\" alt=\"$signName\" />";
    echo "<footer>You are visitor $numberOfEntries to enter $enteredYear</footer>";
}
else {
    ?>
    <h1>Lookup your Zodiac Sign!</h1>
    <form action="BirthYear_ifelse.php" method="POST">
        <div class="form-section">
            <label>Birth Year</label>
            <input
                type="number"
                name="BirthYear"
                min="1912"
                value="<?php echo date("Y"); ?>"/>
        </div>
        <button type="submit" name="Submit">Lookup Year</button>
    </form>
    <?php
}
    ?>
</body>
</html>