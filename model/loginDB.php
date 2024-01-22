<?php
function authenticateUser($username, $password) {
    include_once 'databaseconnection.php';
    
    $username = $conn->real_escape_string($username);

    $stmt = $conn->prepare("SELECT * FROM teacher WHERE userName = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $result = $stmt->get_result();

    $conn->close();

    return $result;
}
?>
