<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../styles.css">
   <title>Edit Profile</title>
</head>
<body>
   <?php include 'Header.php';?>
   <?php include 'Edit_Profile_Header.php';?>
   <?php header("location: Edit_General_Information.php");?>
</body>
</html>

