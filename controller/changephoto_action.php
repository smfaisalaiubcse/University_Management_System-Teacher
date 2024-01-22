<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $flag = true;

    //imageupload
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    if (empty($_FILES['photo']['name'])) {
        $flag = false;
        $_SESSION['uploadimgerr'] = "*Please select a image file first";
    } else if ($_FILES['photo']['type'] !== "image/jpeg" && $_FILES['photo']['type'] !== "image/png") {
        $flag = false;
        $_SESSION['uploadimgerr'] = "*Please upload a jpg/png file";
    } elseif ($_FILES["photo"]["size"] > 1000000) {
        $_SESSION['uploadimgerr'] = "*Sorry, your file is more than 1 MB";
        $flag = false;
    } else {
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
        $_SESSION['uploadimgerr'] = "";
        $image = $_FILES['photo']['name'];
    }

    if ($flag) {
        include_once '../model/changephotoDB.php';
        if (changePhoto($image, $_SESSION['username'])) {
            header("Location: ../view/profile.php");
            $_SESSION['notification'] = "<h3>Your profile picture is changed.</h3>";
        } else {
            echo "Information update failed.";
        }
    } else {
        header("Location: ../view/changephoto.php");
    }
}
?>
