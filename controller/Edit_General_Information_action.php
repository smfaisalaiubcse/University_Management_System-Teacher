<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;

    // First Name validation
    $firstname = test_input($_POST['firstname']);
    if (empty($firstname)) {
        $_SESSION['fnameErr'] = "*First Name is empty";
        $flag = false;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
        $_SESSION['fnameErr'] = "*First Name can only contain letters (A-Z, a-z)";
        $_SESSION['firstname'] = $firstname;
        $flag = false;
    } else {
        $_SESSION['fnameErr'] = "";
        $_SESSION['firstname'] = $firstname;
    }

    // Last Name validation
    $lastname = test_input($_POST['lastname']);
    if (empty($lastname)) {
        $_SESSION['lnameErr'] = "*Last Name is empty";
        $flag = false;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
        $_SESSION['lnameErr'] = "*Last Name can only contain letters (A-Z, a-z)";
        $_SESSION['lastname'] = $lastname;
        $flag = false;
    } else {
        $_SESSION['lnameErr'] = "";
        $_SESSION['lastname'] = $lastname;
    }


    // Father's Name validation
    $fathersname = test_input($_POST['fathersname']);
    if (empty($fathersname)) {
        $_SESSION['fathersnameErr'] = "*Father's Name is empty";
        $flag = false;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fathersname)) {
        $_SESSION['fathersnameErr'] = "*Father's Name can only contain letters (A-Z, a-z)";
        $flag = false;
        $_SESSION['fathersname'] = $fathersname;
    } else {
        $_SESSION['fathersnameErr'] = "";
        $_SESSION['fathersname'] = $fathersname;
    }

    // Mother's Name validation
    $mothersname = test_input($_POST['mothersname']);
    if (empty($mothersname)) {
        $_SESSION['mothersnameErr'] = "*Mother's Name is empty";
        $flag = false;
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $mothersname)) {
        $_SESSION['mothersnameErr'] = "*Mother's Name can only contain letters (A-Z, a-z)";
        $flag = false;
        $_SESSION['mothersname'] = $mothersname;
    } else {
        $_SESSION['mothersnameErr'] = "";
        $_SESSION['mothersname'] = $mothersname;
    }

    //gender validation
    $gender = test_input($_POST['gender']);
    if (empty($gender)) {
        $_SESSION['genderErr'] = "*Gender is Empty";
        $flag = false;
    } else {
        $_SESSION['genderErr'] = "";
        $_SESSION['gender'] = $gender;
    }

    //bloodgroup validation
    $bloodgroup = test_input($_POST['bloodgroup']);
    if (empty($bloodgroup)) {
        $_SESSION['bloodgroupErr'] = "*bloodgroup is Empty";
        $flag = false;
    } else {
        $_SESSION['bloodgroupErr'] = "";
        $_SESSION['bloodgroup'] = $bloodgroup;
    }

    //religion validation
    $religion = test_input($_POST['religion']);
    if (empty($religion)) {
        $_SESSION['religionErr'] = "*religion is Empty";
        $flag = false;
    } else {
        $_SESSION['religionErr'] = "";
        $_SESSION['religion'] = $religion;
    }

   
    if ($flag) {
        include_once '../model/updateGeneralInfoDB.php';
        if (updateGeneralInformation($conn, $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['fathersname'], $_SESSION['mothersname'], $_SESSION['gender'], $_SESSION['bloodgroup'], $_SESSION['religion'], $_SESSION['username'])) {
            $_SESSION['notification'] = "General Information Updated Successfully..";
            header("location: ../view/profile.php");
        } else {
            echo "Information update failed.";
        }
    } else {
        header("Location: ../view/Edit_profile/Edit_General_Information.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
