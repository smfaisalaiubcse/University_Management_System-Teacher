<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    $_SESSION['sq1'] = "";
    $_SESSION['sq2'] = "";
    $_SESSION['sq3'] = "";
    $_SESSION['sq4'] = "";
    $_SESSION['sq5'] = "";
    $_SESSION['sq6'] = "";
    $_SESSION['sqErr'] = "";
    $username = test_input($_POST['username']);
    if (empty($username)) {
        $_SESSION['usernameErr'] = "*Incomplete username";
        $flag = false;
    } else {
        $_SESSION['usernameErr'] = "";
        $_SESSION['username'] = $username;
    }

    //security questions
    $cnt = 0;
    //sq1
    $sq1 = test_input($_POST['sq1']);
    if (empty($sq1)) {
        $cnt++;
    } else {
        $_SESSION['sq1'] = $sq1;
    }
    //sq2
    $sq2 = test_input($_POST['sq2']);
    if (empty($sq2)) {
        $cnt++;
    } else {
        $_SESSION['sq2'] = $sq2;
    }
    //sq3
    $sq3 = test_input($_POST['sq3']);
    if (empty($sq3)) {
        $cnt++;
    } else {
        $_SESSION['sq3'] = $sq3;
    }
    //sq4
    $sq4 = test_input($_POST['sq4']);
    if (empty($sq4)) {
        $cnt++;
    } else {
        $_SESSION['sq4'] = $sq4;
    }
    //sq5
    $sq5 = test_input($_POST['sq5']);
    if (empty($sq5)) {
        $cnt++;
    } else {
        $_SESSION['sq5'] = $sq5;
    }
    //sq6
    $sq6 = test_input($_POST['sq6']);
    if (empty($sq6)) {
        $cnt++;
    } else {
        $_SESSION['sq6'] = $sq6;
    }

    if($cnt > 3) {
        $flag = false;
        $_SESSION['sqErr'] = "*You have to set atleast 3 question answer field.";
    } else {
        $_SESSION['sqErr'] = "";
    }
    if ($flag) {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "university_management_system";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        include_once '../model/forgottenPassDB.php';
        $result = authenticateUserBySq($_SESSION['username'], $_SESSION['sq1'], $_SESSION['sq2'], $_SESSION['sq3'], $_SESSION['sq4'], $_SESSION['sq5'],  $_SESSION['sq6']);
        if ($result == 1) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
            header("Location: ../view/Dashboard.php");
        } else {
            // echo "<h3>Answers are not matching!!</h3>";
            // echo "<a href = \"login.php\"> Go to Log In </a>";
            $_SESSION['notification'] = "Answers not matching, try again!";
            header("Location: ../view/Forgotten_pass.php");
        }
        
    } else {
        header("Location: ../view/Forgotten_pass.php");
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>



