<?php
include_once 'databaseconnection.php';
function updateContactInformation($conn, $email, $phone, $website, $country, $division, $rsc, $postcode, $username) {
    $updateQuery = "UPDATE teacher
                   SET
                   email = ?,
                   phone = ?,
                   website = ?,
                   country = ?,
                   division = ?,
                   rsc = ?,
                   postcode = ?
                   WHERE username = ?"; 
    $updateStmt = $conn->prepare($updateQuery);

    $updateStmt->bind_param("ssssssss", $email, $phone, $website, $country, $division, $rsc, $postcode, $username);

    if ($updateStmt->execute()) {
        return true; // Success
    } else {
        return false; // Failure
    }

    $updateStmt->close();
}
?>
