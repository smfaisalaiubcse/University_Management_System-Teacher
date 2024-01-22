<?php
include_once 'databaseconnection.php';

function checkUsernameExists($username)
{
    global $conn;

    // Checking if the username already exists in the database
    $check_username_sql = "SELECT username FROM teacher WHERE username = ?";
    $check_username_stmt = $conn->prepare($check_username_sql);
    $check_username_stmt->bind_param("s", $username);
    $check_username_stmt->execute();
    $check_username_result = $check_username_stmt->get_result();

    return $check_username_result->num_rows > 0;
}

function insertUserInfo($username, $password, $firstname, $lastname, $fathersname, $mothersname, $gender, $bloodgroup, $religion, $email, $phone, $website, $country, $division, $rsc, $postcode, $image, $sq1, $sq2, $sq3, $sq4, $sq5, $sq6, $SSCScName, $SSCGPA, $SSCPY, $HSCClgName, $HSCGPA, $HSCPY, $BScUnName, $BScCGPA, $BScPY, $MScUnName, $MScCGPA, $MScPY)
{
    global $conn;

    $insert_sql = "INSERT INTO teacher (
        firstName, lastName, FathersName, MothersName, gender, bloodGroup, religion, email, phone, website,
        country, division, rsc, postcode, userName, password, image, sq1, sq2, sq3, sq4, sq5, sq6,
        SSCScName, SSCGPA, SSCPY, HSCClgName, HSCGPA, HSCPY, BScUnName, BScCGPA, BScPY, MScUnName, MScCGPA, MScPY
    ) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param(
        "sssssssssssssssssssssssssssssssssss",
        $firstname,
        $lastname,
        $fathersname,
        $mothersname,
        $gender,
        $bloodgroup,
        $religion,
        $email,
        $phone,
        $website,
        $country,
        $division,
        $rsc,
        $postcode,
        $username,
        $password,
        $image,
        $sq1,
        $sq2,
        $sq3,
        $sq4,
        $sq5,
        $sq6,
        $SSCScName,
        $SSCGPA,
        $SSCPY,
        $HSCClgName,
        $HSCGPA,
        $HSCPY,
        $BScUnName,
        $BScCGPA,
        $BScPY,
        $MScUnName,
        $MScCGPA,
        $MScPY
    );

    if ($insert_stmt->execute()) {
        $insert_stmt->close();
        $conn->close();
        return true;
    } else {
        $_SESSION['me'] = "Error: " . $insert_sql . "<br>" . $conn->error;
    }
    return false;
}
