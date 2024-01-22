<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;

    // User Name validation
    $username = test_input($_POST['username']);
    $_SESSION['username'] = $username;
    if (empty($username)) {
        $_SESSION['unameErr'] = "*User Name is Empty.";
        $flag = false;
    } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        $_SESSION['unameErr'] = "*User Name cannot contain special characters.";
        $flag = false;
    } else {
        $_SESSION['unameErr'] = "";
    }


    $password = test_input($_POST['password']);
    $_SESSION['password'] = $password;
    if (empty($password)) {
        $_SESSION['passwordErr'] = "*Password is Empty.";
        $flag = false;
    } else {
        if (strlen($password) < 8) {
            $_SESSION['passwordErr'] = "*Password must be at least 8 characters long.";
            $flag = false;
        } else {
            $_SESSION['passwordErr'] = "";
        }
    }
    include '../model/loginDB.php';
    if ($flag) {
        $result = authenticateUser($username, $password);

        if ($result->num_rows == 1) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
            header("Location: ../view/Dashboard.php");
        } else {
            $_SESSION['credentialErr'] = "*User Name or password is wrong.";
            header("Location: ../view/login.php");
        }
    } else {
        header("Location: ../view/login.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
