<?php

include_once 'databaseconnection.php';

$username = $_SESSION['username']; 

$sql = "SELECT * FROM teacher WHERE username = '$username'"; 
$result = $conn->query($sql);
   
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    $_SESSION['fathersname'] = $row['FathersName'];
    $_SESSION['mothersname'] = $row['MothersName'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['bloodgroup'] = $row['bloodGroup'];
    $_SESSION['religion'] = $row['religion'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['website'] = $row['website'];
    $_SESSION['country'] = $row['country'];
    $_SESSION['division'] = $row['division'];
    $_SESSION['rsc'] = $row['rsc'];
    $_SESSION['postcode'] = $row['postcode'];
    $_SESSION['address'] = $row['rsc'] . ", " . $row['division'] . ", " . $row['postcode'] . ", " . $row['country'];
    $_SESSION['username'] = $row['userName'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['userID'] = $row['userID'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['SSCScName'] = $row['SSCScName'];
    $_SESSION['SSCGPA'] = $row['SSCGPA'];
    $_SESSION['SSCPY'] = $row['SSCPY'];

    $_SESSION['HSCClgName'] = $row['HSCClgName'];
    $_SESSION['HSCGPA'] = $row['HSCGPA'];
    $_SESSION['HSCPY'] = $row['HSCPY'];

    $_SESSION['BScUnName'] = $row['BScUnName'];
    $_SESSION['BScCGPA'] = $row['BScCGPA'];
    $_SESSION['BScPY'] = $row['BScPY'];
    $_SESSION['MScUnName'] = $row['MScUnName'];
    $_SESSION['MScCGPA'] = $row['MScCGPA'];
    $_SESSION['MScPY'] = $row['MScPY'];
    $_SESSION['sq1'] = $row['sq1'];
    $_SESSION['sq2'] = $row['sq2'];
    $_SESSION['sq3'] = $row['sq3'];
    $_SESSION['sq4'] = $row['sq4'];
    $_SESSION['sq5'] = $row['sq5'];
    $_SESSION['sq6'] = $row['sq6'];    
} else {
   $_SESSION['firstname'] = "";
   $_SESSION['lastname'] = "";
   $_SESSION['fathersname'] = "";
   $_SESSION['mothersname'] = "";
   $_SESSION['gender'] = "";
   $_SESSION['bloodgroup'] = "";
   $_SESSION['religion'] = "";
   $_SESSION['email'] = "";
   $_SESSION['Phone'] = "";
   $_SESSION['website'] = "";
   $_SESSION['country'] = "";
   $_SESSION['division'] = "";
   $_SESSION['rsc'] = "";
   $_SESSION['postcode'] = "";
   $_SESSION['username'] = "";
   $_SESSION['password'] = "";
   $_SESSION['confirm_password'] = "";
}
$conn->close();
?>