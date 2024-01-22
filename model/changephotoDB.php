<?php
function changePhoto($image, $username)
{
    include_once 'databaseconnection.php';

    $updateQuery = "UPDATE teacher
                       SET
                       image = ?
                       WHERE username = ?";

    $updateStmt = $conn->prepare($updateQuery);

    $updateStmt->bind_param("ss", $image, $username);

    if ($updateStmt->execute()) {
        return true;
        
    } else {
        return false;
        
    }

    $updateStmt->close();
}
