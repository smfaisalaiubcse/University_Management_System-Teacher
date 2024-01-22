<?php
include_once 'databaseconnection.php';
function updateGeneralInformation($conn, $firstname, $lastname, $fathersname, $mothersname, $gender, $bloodgroup, $religion, $username) {
    $updateQuery = "UPDATE teacher
                   SET
                   firstName = ?,
                   lastName = ?,
                   FathersName = ?,
                   MothersName = ?,
                   gender = ?,
                   bloodGroup = ?,
                   religion = ?
                   WHERE username = ?"; 

    $updateStmt = $conn->prepare($updateQuery);

    $updateStmt->bind_param("ssssssss", $firstname, $lastname, $fathersname, $mothersname, $gender, $bloodgroup, $religion, $username);

    if ($updateStmt->execute()) {
        return true; // Success
    } else {
        return false; // Failure
    }

    $updateStmt->close();
}
?>
