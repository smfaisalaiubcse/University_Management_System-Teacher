<?php
include_once '../model/displayAssignedAssignmentsDB.php';
include_once '../model/databaseconnection.php';
$courseID = $_GET['courseID'];

echo displayAssignedAssignments($courseID, $conn);
?>