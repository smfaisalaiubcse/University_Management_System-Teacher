<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    
    //security questions
    $cnt = 0;
    //sq1
    $sq1 = test_input($_POST['sq1']);
    if (empty($sq1)) {
        $cnt++;
        $_SESSION['sq1'] = "";
    } else {
        $_SESSION['sq1'] = $sq1;
    }
    //sq2
    $sq2 = test_input($_POST['sq2']);
    if (empty($sq2)) {
        $cnt++;
        $_SESSION['sq2'] = "";
    } else {
        $_SESSION['sq2'] = $sq2;
    }
    //sq3
    $sq3 = test_input($_POST['sq3']);
    if (empty($sq3)) {
        $cnt++;
        $_SESSION['sq3'] = "";
    } else {
        $_SESSION['sq3'] = $sq3;
    }
    //sq4
    $sq4 = test_input($_POST['sq4']);
    if (empty($sq4)) {
        $cnt++;
        $_SESSION['sq4'] = "";
    } else {
        $_SESSION['sq4'] = $sq4;
    }
    //sq5
    $sq5 = test_input($_POST['sq5']);
    if (empty($sq5)) {
        $cnt++;
        $_SESSION['sq5'] = "";
    } else {
        $_SESSION['sq5'] = $sq5;
    }
    //sq6
    $sq6 = test_input($_POST['sq6']);
    if (empty($sq6)) {
        $cnt++;
        $_SESSION['sq6'] = "";
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
        include_once '../model/updateSecurityInfoDB.php';
        if (updateSecurityInformation($conn, $_SESSION['sq1'], $_SESSION['sq2'], $_SESSION['sq3'], $_SESSION['sq4'], $_SESSION['sq5'], $_SESSION['sq6'], $_SESSION['username'])) {
            $_SESSION['notification'] = "Security questions Updated Successfully..";
            header("location: ../view/profile.php");
        } else {
            echo "Information update failed.";
        }
    } else {
        // if(empty($email)) echo "email error";
        // echo "faisal";
        header("Location: ../view/Edit_profile/Edit_Security_Information.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
