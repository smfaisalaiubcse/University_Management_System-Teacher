<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: ../view/login.php"); 
    exit();
}

$username = $_SESSION['username'];

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "university_management_system";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $currentPassword = test_input($_POST['currentPassword']);
    if (empty($currentPassword)) {
        $_SESSION['currentPasswordErr'] = "*Incomplete currentPassword";
        $flag = false;
    } else {
        $_SESSION['currentPasswordErr'] = "";
        $_SESSION['currentPassword'] = $currentPassword;

        $query = "SELECT password FROM teacher WHERE userName = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($storedPassword);

        if ($stmt->fetch()) {
            $currentPassword = test_input($_POST['currentPassword']);

            if ($currentPassword === $storedPassword) { 
                $_SESSION['currentPasswordErr'] = "";
            } else {
                $_SESSION['currentPasswordErr'] = "*Incorrect current password";
                $flag = false;
            }
        } else {
            $_SESSION['currentPasswordErr'] = "*User not found"; 
            $flag = false;
        }
        $stmt->close();
    }

    $newpassword = test_input($_POST['newpassword']);
     if (empty($newpassword)) {
        $_SESSION['newpasswordErr'] = "*Incomplete newpassword";
        $flag = false;
    } else {
        $_SESSION['newpasswordErr'] = "";
        $_SESSION['newpassword'] = $newpassword;
    }

    // Confirm Password validation
    $confirm_new_password = test_input($_POST['confirm_new_password']);
    if (empty($confirm_new_password)) {
        $_SESSION['confirm_new_passwordErr'] = "*Incomplete confirm password";
        $flag = false;
    } else {
        $_SESSION['confirm_new_passwordErr'] = "";
        $_SESSION['confirm_new_password'] = $confirm_new_password;
    }

    $_SESSION['passwordErr'] = ""; 

    if($_SESSION['newpasswordErr'] == "" && $_SESSION['confirm_new_passwordErr'] == "") {
        if ($newpassword !== $confirm_new_password) {
            $_SESSION['passwordErr'] = "*New Passwords and confirm password do not match";
            $flag = false;
        }
    }

   if ($flag) {
        $updateQuery = "UPDATE teacher SET password = ? WHERE userName = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $newpassword, $username);

        if ($updateStmt->execute()) {
            $_SESSION['notification'] = "Password changed Successfully.";
            header("location: ../view/profile.php");
        } else {
            $_SESSION['notification'] = "Failed to update password";
            header("location: ../view/profile.php");
        }

        $updateStmt->close();
    } else {
        header("Location: ../view/change_password.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
