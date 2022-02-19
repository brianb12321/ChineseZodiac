<?php
class EventCalendar {
    private $DBConnect = null;

    function __construct() {
        include("Includes/inc_ChineseZodiacDB.php");
        $this->DBConnect = $DBConnect;
    }
    function __destruct()
    {
        if(!$this->DBConnect->connect_error) {
            $this->DBConnect->close();
        }
    }
    function __wakeup()
    {
        include("Includes/inc_ChineseZodiacDB.php");
        $this->DBConnect = $DBConnect;
    }

    public function addEvent($Date, $Title, $Description) {
        if(!empty($Date) && (!empty($Title))) {
            $SQLString = "INSERT INTO event_calendar(EventDate, Title, Description) VALUES('$Date', '$Title', '$Description')";
            $QueryResult = $this->DBConnect->query($SQLString);
            if($QueryResult === false) {
                echo "<p>Unable to save the event. Error code " . $this->DBConnect->errno . ": " . $this->DBConnect->error . "</p>\n";
            }
            else {
                echo "<p>The event was successfully saved.</p>\n";
            }
        }
        else {
            echo "<p>You must provide a date and title for the event.</p>\n";
        }
    }
    public function getMonthlyCalendar($Year, $Month) {
        if(empty($Year)) {
            $Year = date("Y");
        }
        if(empty($Month)) {
            $Month = date("n");
        }
        $FirstDay = mktime(0, 0, 0, $Month, 1, $Year);
        $FirstDOW = date("w", $FirstDay);
        $LeapYearFlag = date("L", $FirstDay);
        $MonthName = date("F", $FirstDay);
        if($Month == 2) {
            $LastDay = 28 + $LeapYearFlag;
        }
        else if(($Month == 4) || ($Month == 6) || ($Month == 9) || ($Month == 11)) {
            $LastDay = 30;
        }
        else {
            $LastDay = 31;
        }
        echo "<table border='1'1>\n";
        echo "<tr><td><a href='" . $_SERVER["SCRIPT_NAME"] . "?PHPSESSID=" . session_id() . "&Year=" . ($Year - 1) . "&Month=12'>Previous Year</a></td>\n";
        if($Month == 1) {
            echo "<td><a href='" . $_SERVER["SCRIPT_NAME"] . "?PHPSESSID=" . session_id() . "&Year=" . ($Year - 1) . "&Month=12'>Previous Month</a></td>\n";
        }
        else {
            echo "<td><a href='" . $_SERVER["SCRIPT_NAME"] . "?PHPSESSID=" . session_id() . "&Year=$Year&Month=" . ($Month - 1) . "'>Previous Month</a></td>\n";
        }
        echo "<td colspan='3'>$MonthName $Year</td>\n";
        if($Month == 12) {
            echo "<td><a href='" . $_SERVER["SCRIPT_NAME"] . "?PHPSESSID=" . session_id() . "&Year=" . ($Year + 1) . "&Month=1'>Next Month</a></td>\n";
        }
        else {
            echo "<td><a href='" . $_SERVER["SCRIPT_NAME"] . "?PHPSESSID=" . session_id() . "&Year=$Year&Month=" . ($Month + 1) . "'>Next Month</a></td>\n";
        }
        echo "<td><a href='" . $_SERVER["SCRIPT_NAME"] . "?PHPSESSID=" . session_id() . "&Year=" . ($Year + 1) . "&Month=$Month'>Next Year</a></td></tr>\n";

        echo "<tr>";
        for($i = 0; $i < $FirstDOW; ++$i) {
            echo "<td>&nbsp;</td>";
        }
        for($i = 1; $i <= $LastDay; ++$i) {
            if((($FirstDOW + $i) % 7) == 1) {
                echo "<tr>";
            }
            echo "<td valign='top'>$i";
            echo "<ul>";
            $SQLString = "SELECT EventID, Title FROM event_calendar WHERE EventDate='$Year-$Month-$i'";
            $QueryResult = @$this->DBConnect->query($SQLString);
            if($QueryResult !== FALSE) {
                if($QueryResult->num_rows > 0) {
                    while(($Row = $QueryResult->fetch_assoc()) !== null) {
                        echo "<li><a href='EventDetails.php?PHPSESSID=" . session_id() . "&EventID=" . $Row["EventID"] . "'>" . htmlentities($Row["Title"]) . "</a></li>";
                    }
                }
                echo "</ul>";
                echo "</td>";
                if((($FirstDOW + $i) % 7) == 0) {
                    echo "</tr>";
                }
            }
        }
        if((($i + $FirstDOW) % 7) != 0) {
            for($j = 0; (($i + $j + $FirstDOW) % 7) != 0; ++$j) {
                echo "<td>&nbsp;</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function getEventDetails($EventId) {
        $Statement = $this->DBConnect->prepare("SELECT * FROM event_calendar WHERE EventID=?");
        $Statement->bind_param("i", $EventId);
        if($Statement->execute()) {
            $QueryResult = $Statement->get_result();
            if($QueryResult->num_rows > 0) {
                $EventDetails = $QueryResult->fetch_assoc();
                echo "<h1>{$EventDetails["Title"]}</h1>";
                echo "<p>Event Date: {$EventDetails["EventDate"]}</p>\n";
                echo "<p>Description<br/></p>\n";
                echo "<p>" . htmlentities($EventDetails["Description"]) . "</p>\n";
            }
            else {
                echo "<p>The event ID for $EventId does not exist.</p>\n";
            }
        }
        else {
            echo "<p>Cannot retrieve event information at this moment. Please try again later.</p>\n";
        }
    }
}
?>