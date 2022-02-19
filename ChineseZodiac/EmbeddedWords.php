<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="site.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedded Words</title>
</head>
<body>
    <h1>Embedded Words</h1>
    <hr />
    <?php
function BuildLetterCounts($text) {
    $text = strtoupper($text);
    $letter_counts = count_chars($text);
    return $letter_counts;
}
function AContainsB($A, $B) {
    $retval = TRUE;
    $first_letter_index = ord("A");
    $last_letter_index = ord("Z");
    for($letter_index = $first_letter_index; $letter_index <= $last_letter_index; $letter_index++) {
        if($A[$letter_index] < $B[$letter_index]) {
            $retval = FALSE;
        }
    }
    return $retval;
}

$Phrases = array(
    "Your Chinese zodiac sign tells a lot about
    your personality.",
    "Embed PHP scripts within an XHTML
    document."
);
$SignNames = array(
    "Rat",
    "Ox",
    "Tiger",
    "Rabbit",
    "Dragon",
    "Snake",
    "Horse",
    "Goat",
    "Monkey",
    "Rooster",
    "Dog",
    "Pig");

foreach($Phrases as $Phrase) {
    $PhraseArray = BuildLetterCounts($Phrase);
    $GoodWords = array();
    $BadWords = array();
    foreach($SignNames as $Word) {
        $WordArray = BuildLetterCounts($Word);
        if(AContainsB($PhraseArray, $WordArray)) {
            $GoodWords[] = $Word;
        }
        else {
            $BadWords[] = $Word;
        }
    }
    echo "<p>The following words can be made from
        the letters in the phrase
        &quot;$Phrase&quot;:";
    foreach($GoodWords as $Word) {
        echo " $Word";
    }
    echo "</p>\r\n";
    echo "<p>The following words can not
        be made from the letters in the phrase
        &quot;$Phrase&quot;:";
    foreach($BadWords as $Word) {
        echo " $Word";
    }
    echo "</p>\r\n";
    echo "<hr />\r\n";
}
    ?>
</body>
</html>