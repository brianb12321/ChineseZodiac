<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birth Year Switch</title>
    <link rel="stylesheet" href="site.css">
</head>
<body>
    <?php
if(isset($_POST["Submit"])) {
    $animalSigns = array(
        "Rat" => array(
            "Start Date" => 1900,
            "End Date" => 2020,
            "President" => "George Washington"
        ),
        "Ox" => array(
            "Start Date" => 1901,
            "End Date" => 2021,
            "President" => "Barack Obama"
        ),
        "Tiger" => array(
            "Start Date" => 1902,
            "End Date" => 2022,
            "President" => "Dwight Eisenhower"
        ),
        "Rabbit" => array(
            "Start Date" => 1903,
            "End Date" => 2023,
            "President" => "John Adams"
        ),
        "Dragon" => array(
            "Start Date" => 1904,
            "End Date" => 2024,
            "President" => "Abraham Lincoln"
        ),
        "Snake" => array(
            "Start Date" => 1905,
            "End Date" => 2025,
            "President" => "John Kennedy"
        ),
        "Horse" => array(
            "Start Date" => 1906,
            "End Date" => 2026,
            "President" => "Theodore Roosevelt"
        ),
        "Goat" => array(
            "Start Date" => 1907,
            "End Date" => 2027,
            "President" => "James Madison"
        ),
        "Monkey" => array(
            "Start Date" => 1908,
            "End Date" => 2028,
            "President" => "Harry Truman"
        ),
        "Rooster" => array(
            "Start Date" => 1909,
            "End Date" => 2029,
            "President" => "Grover Cleveland"
        ),
        "Dog" => array(
            "Start Date" => 1910,
            "End Date" => 2030,
            "President" => "George Walker Bush"
        ),
        "Pig" => array(
            "Start Date" => 1911,
            "End Date" => 2031,
            "President" => "Ronald Reagan"
        )
    );
    //Begin the calendar at 1900.
    $startingYear = 1900;
    $enteredYear = $_POST["BirthYear"];
    $index = ($enteredYear - $startingYear) % 12;

    switch($index) {
        case 0:
            $signName = "Rat";
            $signImage = "Images/Rat.jpg";
            break;
        case 1:
            $signName = "Ox";
            $signImage = "Images/Ox.png";
            break;
        case 2:
            $signName = "Tiger";
            $signImage = "Images/Tiger.jpg";
            break;
        case 3:
            $signName = "Rabbit";
            $signImage = "Images/Rabbit.jpg";
            break;
        case 4:
            $signName = "Dragon";
            $signImage = "Images/Dragon.jpg";
            break;
        case 5:
            $signName = "Snake";
            $signImage = "Images/Snake.png";
            break;
        case 6:
            $signName = "Horse";
            $signImage = "Images/Horse.png";
            break;
        case 7:
            $signName = "Goat";
            $signImage = "Images/Goat.jpg";
            break;
        case 8:
            $signName = "Monkey";
            $signImage = "Images/Monkey.png";
            break;
        case 9:
            $signName = "Rooster";
            $signImage = "Images/Rooster.png";
            break;
        case 10:
            $signName = "Dog";
            $signImage = "Images/Dog.jfif";
            break;
        case 11:
            $signName = "Pig";
            $signImage = "Images/Pig.jfif";
            break;
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
    $signMessage = "<p>You were born under the sign of the <strong>$signName</strong></p>";
    $signMessage .= "<p>If your Chinese zodiac sign is the $signName, you share a zodiac sign with President <strong>" . $animalSigns[$signName]["President"] . ".</strong></p>";
    $signMessage .= "<p>Years of the $signName include ";
    for($i = $animalSigns[$signName]["Start Date"]; $i < $animalSigns[$signName]["End Date"]; $i += 12) {
        $signMessage .= $i . ", ";
    }
    $signMessage .= "and " . $animalSigns[$signName]["End Date"] . ".</p>";
    echo $signMessage;
    echo "<img src=\"$signImage\" alt=\"$signName\" /><br/>";
    echo "<a href=\"BirthYear_switch.php\"><button>Go Back</button></a>";
    echo "<footer>You are visitor $numberOfEntries to enter $enteredYear</footer>";
}
else {
    ?>
    <h1>Lookup your Zodiac Sign!</h1>
    <form action="BirthYear_switch.php" method="POST">
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