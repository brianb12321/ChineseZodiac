<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site.css">
    <style>
        /* TODO: Make page responsive */
        div {
            display: flex;
        }
        img {
            width: 50px;
            height: 50px;
            padding-right: 20px;
        }
        ul {
            list-style: none;
        }
        #bigImage {
            width: 100%;
            height: 100%;
        }
    </style>
    <title>Chinese Zodiac Gallery</title>
</head>
<body>
    <?php
$images = array(
    "Dog.jfif" => "Dog",
    "Dragon.jpg" => "Dragon",
    "Goat.jpg" => "Goat",
    "Horse.png" => "Horse",
    "Monkey.png" => "Monkey",
    "Ox.png" => "Ox",
    "Pig.jfif" => "Pig",
    "Rabbit.jpg" => "Rabbit",
    "Rat.jpg" => "Rat",
    "Rooster.png" => "Rooster",
    "Snake.png" => "Snake",
    "Tiger.jpg" => "Tiger"
);
echo "<h1>Image gallery</h1>";
echo "<div>";
foreach($images as $fileName => $description) {
    echo "<ul>";
    echo "<li><img width=\"50%\" height=\"50%\" src=\"Images/$fileName\" alt=$description /><a href=\"ZodiacGallery.php?image=$fileName&imageAlt=$description\">$description</a></li>";
    echo "</ul>";
}
echo "</div>";
if(isset($_GET["image"])) {
    echo "<img id=\"bigImage\"src=\"Images/{$_GET["image"]}\" alt=\"{$_GET["imageAlt"]}\" />";
}
    ?>
</body>
</html>