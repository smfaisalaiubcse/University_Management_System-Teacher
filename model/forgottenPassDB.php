<?php
function authenticateUserBySq($username, $sq1, $sq2, $sq3, $sq4, $sq5, $sq6) {
    include_once 'databaseconnection.php';
    
    $sql = "SELECT username, password FROM teacher WHERE username = ? AND sq1 = ? AND sq2 = ? AND sq3 = ? AND sq4 = ? AND sq5 = ? AND sq6 = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssssss", $username, $sq1, $sq2, $sq3, $sq4, $sq5, $sq6);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->num_rows;
        if ($result !== FALSE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
}
?>