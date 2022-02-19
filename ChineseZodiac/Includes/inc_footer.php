<p>&copy; 2021</p>

<p>Total visitors to this site: <?php echo $Visitors ?></p>

<?php
    include("inc_connect.php");
    if($DBConnect != FALSE) {
        //Get proverb count.
        $ProverbCount = $DBConnect->query("SELECT COUNT(proverb) FROM randomproverb")->fetch_row()[0];
        $Proverbs = $DBConnect->query("SELECT proverb FROM randomproverb")->fetch_all(MYSQLI_NUM);
        if($ProverbCount > 0) {
            //More cryptographically random. Overkill? Probably :)
            $RandomIndex = random_int(0, $ProverbCount - 1);
            echo "<p>A randomly displayed Chinese proverb read from a database:<br/>";
            echo "{$Proverbs[$RandomIndex][0]}</p>";
            //Update display_count field.
            $SQLQuery = $DBConnect->prepare("UPDATE randomproverb SET display_count = display_count + 1 WHERE proverb=?");
            $SQLQuery->bind_param("s", $Proverbs[$RandomIndex][0]);
            $SQLQuery->execute();
            if($SQLQuery->affected_rows < 1) {
                echo "<p>Unable to update proverb's display_count field.</p>";
            }
        }
        $DBConnect->close();
    }

    //Select random dragon images
    $images = scandir("Images");
    $dragonImages = array();
    foreach($images as $image) {
        if(preg_match("/^Dragon\d+\.(jfif|png|jpg)$/", $image)) {
            array_push($dragonImages, $image);
        }
    }
    shuffle($dragonImages);
    echo "<img src=\"Images/$dragonImages[0]\" alt=\"$dragonImages[0]\" />";
?>