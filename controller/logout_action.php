<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();

    header("Location: ../view/login.php");
    exit();
} else {

}