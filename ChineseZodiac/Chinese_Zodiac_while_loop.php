<link rel="stylesheet" href="site.css" />

<style>
table {
    width: 100%;
    height: 100%;
    font-size: 20pt;
    text-align: center;
}
table tr td {
    border: 3px solid black;
}
.imageRow {
    height: 100px;
    width: 100px;
}

</style>

<?php
include("Includes/inc_table_utilities.php");

echo "<h1>Chinese Zodiac While Loop</h1>";

//https://stackoverflow.com/questions/9744192/multi-line-strings-in-php
$table = <<<EOD
<table>
        <tr>
            <th>Rat</th>
            <th>Ox</th>
            <th>Tiger</th>
            <th>Rabbit</th>
            <th>Dragon</th>
            <th>Snake</th>
            <th>Horse</th>
            <th>Goat</th>
            <th>Monkey</th>
            <th>Rooster</th>
            <th>Dog</th>
            <th>Pig</th>
        </tr>
EOD;

$images = array(
    "Images/Rat.jpg",
    "Images/Ox.png",
    "Images/Tiger.jpg",
    "Images/Rabbit.jpg",
    "Images/Dragon.jpg",
    "Images/Snake.png",
    "Images/Horse.png",
    "Images/Goat.jpg",
    "Images/Monkey.png",
    "Images/Rooster.png",
    "Images/Dog.jfif",
    "Images/Pig.jfif");

beginRow($table, "imageRow");
foreach($images as $image) {
    insertRowCell($table, "<img src=\"$image\" />");
}
endRow($table);
$startingYear = 1911;
$currentYear = 2021;
$numberOfCells = $currentYear - $startingYear;
$currentCellPosition = 1;
$currentRow = array();

while($currentCellPosition <= $numberOfCells) {
    $currentRow[] = $startingYear + $currentCellPosition;
    if($currentCellPosition % 12 === 0) {
        addRowArray($table, $currentRow);
        $currentRow = array();
    }
    $currentCellPosition++;
}

//Write any additional cells to the table.
addRowArray($table, $currentRow);
closeTable($table);
echo $table;