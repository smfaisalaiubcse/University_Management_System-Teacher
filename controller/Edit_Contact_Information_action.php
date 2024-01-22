<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: ../view/login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;
    
    //Email validation
    $email = test_input($_POST['email']);
    if(empty($email)) {
        $_SESSION['emailErr'] = "*Email field is Empty";
        $flag = false;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['emailErr'] = "*Invalid Email format";
        $flag = false;
    } else {
        $_SESSION['emailErr'] = "";
        $_SESSION['email'] = $email;
        // echo "email is not empty";
    }

    // Phone/Mobile validation
    $phone = test_input($_POST['phone']);
    if (empty($phone)) {
        $_SESSION['phoneErr'] = "*Phone is empty";
        $_SESSION['phone'] = $phone;
        $flag = false;
    } elseif (!preg_match("/^[0-9\+](\d{10}|\d{13})$/", $phone)) {
        $_SESSION['phoneErr'] = "*Phone must be exactly 11 or 14 digits and can only contain digits and the + sign";
        $_SESSION['phone'] = $phone;
        $flag = false;
    } else {
        $_SESSION['phoneErr'] = "";
        $_SESSION['phone'] = $phone;
    }


    $website = test_input($_POST['website']);
    if(empty($website)) {
        $_SESSION['website'] = "";
        $_SESSION['websiteErr'] = "";
    } else {
        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $_SESSION['websiteErr'] = "*Invalid website format";
            $flag = false;
        } else {
            $_SESSION['websiteErr'] = "";
            $_SESSION['website'] = $website;
        }
    }

    //country validation
    $country = test_input($_POST['country']);
    if (empty($country)) {
        $_SESSION['countryErr'] = "*Incomplete country";
        $flag = false;
    } else {
        $_SESSION['countryErr'] = "";
        $_SESSION['country'] = $country;
    }

    //division validation
    $division = test_input($_POST['division']);
    if (empty($division)) {
        $_SESSION['divisionErr'] = "*Incomplete division";
        $flag = false;
    } else {
        $_SESSION['divisionErr'] = "";
        $_SESSION['division'] = $division;
    }

    //division rsc
    $rsc = test_input($_POST['rsc']);
    if (empty($rsc)) {
        $_SESSION['rscErr'] = "*Incomplete road/street/city";
        $flag = false;
    } else {
        $_SESSION['rscErr'] = "";
        $_SESSION['rsc'] = $rsc;
    }

    $postcode = test_input($_POST['postcode']);
    if (empty($postcode)) {
        $_SESSION['postcodeErr'] = "*Incomplete postcode";
        $flag = false;
    } else {
        $_SESSION['postcodeErr'] = "";
        $_SESSION['postcode'] = $postcode;
    }

    if ($flag) {
        include_once '../model/updateContactInfoDB.php';
        if (updateContactInformation($conn, $_SESSION['email'], $_SESSION['phone'], $_SESSION['website'], $_SESSION['country'], $_SESSION['division'], $_SESSION['rsc'], $_SESSION['postcode'], $_SESSION['username'])) {
            $_SESSION['notification'] = "Contact Information Updated Successfully..";
            header("location: ../view/profile.php");
        } else {
            echo "Information update failed.";
        }
    } else {
        header("Location: ../view/Edit_profile/Edit_Contact_Information.php");
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
