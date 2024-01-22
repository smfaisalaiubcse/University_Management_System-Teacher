<?php
include_once 'databaseconnection.php';
function updateSecurityInformation($conn, $sq1, $sq2, $sq3, $sq4, $sq5, $sq6, $username) {
    $updateQuery = "UPDATE teacher
                   SET
                   sq1 = ?,
                   sq2 = ?,
                   sq3 = ?,
                   sq4 = ?,
                   sq5 = ?,
                   sq6 = ?
                   WHERE username = ?"; 
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("sssssss", $sq1, $sq2, $sq3, $sq4, $sq5, $sq6, $username);

    if ($updateStmt->execute()) {
        return true; // Success
    } else {
        return false; // Failure
    }

    $updateStmt->close();
}
?>
