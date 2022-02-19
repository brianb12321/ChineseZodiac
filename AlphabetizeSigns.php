<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css" />
    <title>Enter Zodiac Signs</title>
    <style>
        .validation-error {
            color: red;
        }
    </style>
</head>
<body>
    <?php

    function ucFirstOnElement($element) {
        return ucfirst($element);
    }

if(!isset($_POST["Submit"])) {
    ?>
    <form action="AlphabetizeSigns.php" method="POST">
        <div class="form-section">
            <label>Enter Name of a Zodiac Sign (rat, ox, tiger, rabbit, dragon, snake, horse, goat, monkey, rooster, dog and pig). Please separate signs with a comma. (,) These entries will be sorted alphabetically once you submit the form.</label>
            <input type="text" name="ZodiacSigns" />
        </div>
        <button type="submit" name="Submit">Submit</button>
    </form>
    <?php
}
else {
    $signs = array("Rat", "Ox", "Tiger", "Rabbit", "Dragon", "Snake", "Horse", "Goat", "Monkey", "Rooster", "Dog", "Pig");
    //Validation
    $enteredSignsRaw = $_POST["ZodiacSigns"];
    if(empty($enteredSignsRaw)) {
        echo "<p>No Zodiac Signs entered</p>";
    }
    else {
        $enteredSigns = array_map("ucFirstOnElement", explode(",", str_replace(" ", "", $enteredSignsRaw)));
        $enteredSigns = array_unique($enteredSigns);
        $allValid = true;
        foreach($enteredSigns as $sign) {
            if(!in_array($sign, $signs)) {
                $allValid = false;
                echo "</p>$sign is not one of the twelve zodiac signs. You must enter one of the following signs: rat, ox, tiger, rabbit, dragon, snake, horse, goat, monkey, rooster, dog or pig</p>";
            }
        }
        if(!$allValid) {
            echo "<p class=\"validation-error\"> You have one or more validation errors.</p>";
        }
        else {
            echo "<p>Displaying Chinese Zodiac signs in alphabetical order:</p>";
            natsort($enteredSigns);
            echo "<ol>";
            foreach($enteredSigns as $sign) {
                echo "<li>$sign</li>";
            }
            echo "</ol>";
        }
    }
    echo "<a href=\"AlphabetizeSigns.php\"><button>Enter More Zodiac Signs</button></a>";
}
?>
    
</body>
</html>