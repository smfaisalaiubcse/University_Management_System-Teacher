<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $flag = true;

    //Academic information: 
    //SSC Informations:

    //SSC School Name
    $SSCScName = test_input($_POST['SSCScName']);
    if (empty($SSCScName)) {
        $_SESSION['SSCScNameErr'] = "*Incomplete SSC School Name";
        $flag = false;
    } else {
        $_SESSION['SSCScNameErr'] = "";
        $_SESSION['SSCScName'] = $SSCScName;
    }

    //SSC GPA
    $SSCGPA = test_input($_POST['SSCGPA']);
    if (empty($SSCGPA)) {
        $_SESSION['SSCGPAErr'] = "*Incomplete SSC GPA";
        $flag = false;
    } elseif (!filter_var($SSCGPA, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['SSCGPAErr'] = "*SSC GPA must be a valid float number";
        $flag = false;
        $_SESSION['SSCGPA'] = $SSCGPA;
    } else {
        $_SESSION['SSCGPAErr'] = "";
        $_SESSION['SSCGPA'] = $SSCGPA;
    }

    //SSC Passing Year
    $SSCPY = test_input($_POST['SSCPY']);
    if (empty($SSCPY)) {
        $_SESSION['SSCPYErr'] = "*Incomplete SSC Passing Year";
        $flag = false;
    } else {
        $_SESSION['SSCPYErr'] = "";
        $_SESSION['SSCPY'] = $SSCPY;
    }

    //HSC Informations:

    //HSC School Name
    $HSCClgName = test_input($_POST['HSCClgName']);
    if (empty($HSCClgName)) {
        $_SESSION['HSCClgNameErr'] = "*Incomplete HSC College Name";
        $flag = false;
    } elseif (!filter_var($HSCGPA, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['HSCGPAErr'] = "*HSC GPA must be a valid float number";
        $flag = false;
        $_SESSION['HSCGPA'] = $HSCGPA;
    } else {
        $_SESSION['HSCClgNameErr'] = "";
        $_SESSION['HSCClgName'] = $HSCClgName;
    }

    //HSC GPA
    $HSCGPA = test_input($_POST['HSCGPA']);
    if (empty($HSCGPA)) {
        $_SESSION['HSCGPAErr'] = "*Incomplete HSC GPA";
        $flag = false;
    } else {
        $_SESSION['HSCGPAErr'] = "";
        $_SESSION['HSCGPA'] = $HSCGPA;
    }

    //HSC Passing Year
    $HSCPY = test_input($_POST['HSCPY']);
    if (empty($HSCPY)) {
        $_SESSION['HSCPYErr'] = "*Incomplete HSC Passing Year";
        $flag = false;
    } else {
        $_SESSION['HSCPYErr'] = "";
        $_SESSION['HSCPY'] = $HSCPY;
    }

    //BSc Informations:

    //BSc School Name
    $BScUnName = test_input($_POST['BScUnName']);
    if (empty($BScUnName)) {
        $_SESSION['BScUnNameErr'] = "*Incomplete BSc University Name";
        $flag = false;
    } else {
        $_SESSION['BScUnNameErr'] = "";
        $_SESSION['BScUnName'] = $BScUnName;
    }

    //BSc GPA
    $BScCGPA = test_input($_POST['BScCGPA']);
    if (empty($BScCGPA)) {
        $_SESSION['BScCGPAErr'] = "*Incomplete BSc CGPA";
        $flag = false;
    } elseif (!filter_var($BScCGPA, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['BScCGPAErr'] = "*BScC GPA must be a valid float number";
        $flag = false;
        $_SESSION['BScCGPA'] = $BScCGPA;
    } else {
        $_SESSION['BScCGPAErr'] = "";
        $_SESSION['BScCGPA'] = $BScCGPA;
    }

    //BSc Passing Year
    $BScPY = test_input($_POST['BScPY']);
    if (empty($BScPY)) {
        $_SESSION['BScPYErr'] = "*Incomplete BSc Passing Year";
        $flag = false;
    } else {
        $_SESSION['BScPYErr'] = "";
        $_SESSION['BScPY'] = $BScPY;
    }
    //MSc Informations:

    //MSc School Name
    $MScUnName = test_input($_POST['MScUnName']);
    if (empty($MScUnName)) {
        $_SESSION['MScUnNameErr'] = "*Incomplete MSc University Name";
        $flag = false;
    } else {
        $_SESSION['MScUnNameErr'] = "";
        $_SESSION['MScUnName'] = $MScUnName;
    }

    //MSc GPA
    $MScCGPA = test_input($_POST['MScCGPA']);
    if (empty($MScCGPA)) {
        $_SESSION['MScCGPAErr'] = "*Incomplete MSc CGPA";
        $flag = false;
    } elseif (!filter_var($MScCGPA, FILTER_VALIDATE_FLOAT)) {
        $_SESSION['MScCGPAErr'] = "*MScC GPA must be a valid float number";
        $flag = false;
        $_SESSION['MScCGPA'] = $MScCGPA;
    } else {
        $_SESSION['MScCGPAErr'] = "";
        $_SESSION['MScCGPA'] = $MScCGPA;
    }

    //MSc Passing Year
    $MScPY = test_input($_POST['MScPY']);
    if (empty($MScPY)) {
        $_SESSION['MScPYErr'] = "*Incomplete MSc Passing Year";
        $flag = false;
    } else {
        $_SESSION['MScPYErr'] = "";
        $_SESSION['MScPY'] = $MScPY;
    }
    include_once '../model/updateAcademicInfoDB.php';
    if ($flag) {
        if (updateAcademicInformation($conn, $SSCScName, $SSCGPA, $SSCPY, $HSCClgName, $HSCGPA, $HSCPY, $BScUnName, $BScCGPA, $BScPY, $MScUnName, $MScCGPA, $MScPY, $_SESSION['username'])) {
            $_SESSION['notification'] = "Academic Information Updated Successfully..";
            header("location: ../view/profile.php");
        } else {
            echo "Information update failed.";
        }
    } else {
        header("Location: ../view/Edit_profile/Edit_Academic_Information.php");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
