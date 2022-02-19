<?php
//Remove \r\n to suppress a new-line.
$NEW_LINE = "\r\n";

function newTable() {
    global $NEW_LINE;
    return "<table>$NEW_LINE";
}
function beginRow(&$tableBuffer, $class = "") {
    global $NEW_LINE;
    if(empty($class)) {
        $tableBuffer .= "<tr>";
    } else {
        $tableBuffer .= "<tr class=\"$class\">";
    }
    $tableBuffer .= $NEW_LINE;
}
function insertRowCell(&$tableBuffer, $rowCell) {
    global $NEW_LINE;
    $tableBuffer .= "<td>$rowCell</td>$NEW_LINE";
}
function endRow(&$tableBuffer) {
    global $NEW_LINE;
    $tableBuffer .= "<tr/>$NEW_LINE";
}
function addRowArray(&$tableBuffer, $rowArray, $class = "") {
    if(count($rowArray) > 0) {
        beginRow($tableBuffer, $class);
        for($i = 0; $i < count($rowArray); $i++) {
            insertRowCell($tableBuffer, $rowArray[$i]);
        }
        endRow($tableBuffer);
    }
}
function closeTable(&$tableBuffer) {
    global $NEW_LINE;
    $tableBuffer .= "</table>$NEW_LINE";   
}
?>