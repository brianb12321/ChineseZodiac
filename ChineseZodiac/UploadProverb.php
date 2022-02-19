<form action="index.php?page=midterm_assessment" method="POST" autocomplete="off">
    <h1>Upload a Proverb!</h1>
    <?php
if(isset($_POST["Submit"])) {
    if(strlen($_POST["Proverb"]) <= 0) {
        $SubmitStatus = "Proverb must contain at least one character.";
    }
    else {
        include("Includes/inc_connect.php");
        if($DBConnect !== FALSE) {

            //Taken from feedback
            $SQLstring = "SELECT MAX(proverb_number) FROM randomproverb";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            $row = mysqli_fetch_array($QueryResult);
            $MaxNum = $row[0];
            $SQLQuery = $DBConnect->prepare("INSERT INTO randomproverb VALUES({$MaxNum} + 1, ?, 0)");
            $SQLQuery->bind_param("s", $_POST["Proverb"]);
            if(!$SQLQuery->execute()) {
                $SubmitStatus = "Unable to submit proverb right now. Please try again later.";
            }
            else {
                $SubmitStatus = "Proverb successfully added.";
            }
        }
        else {
            $SubmitStatus = "Unable to submit proverb right now. Please try again later.";
        }
    }
    ?>
    <div><?php echo "<p>" . $SubmitStatus . "</p>"; ?></div>
    <?php
}
    ?>
    <div class="form-section">
        <label>Proverb</label>
        <input type="text" name="Proverb"></textarea>
    </div>
    <button name="Submit" type="submit">Add Chinese Proverb</button>
    <?php
    ?>
</form>

<script>
//HACK: Get rid of form-submission message when user clicks back button.
//https://stackoverflow.com/questions/19215637/navigate-back-with-php-form-submission
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>