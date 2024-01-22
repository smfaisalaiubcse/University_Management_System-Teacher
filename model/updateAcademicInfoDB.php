<?php
include_once 'databaseconnection.php';
function updateAcademicInformation($conn, $SSCScName, $SSCGPA, $SSCPY, $HSCClgName, $HSCGPA, $HSCPY, $BScUnName, $BScCGPA, $BScPY, $MScUnName, $MScCGPA, $MScPY, $username)
{
    $updateQuery = "UPDATE teacher
                    SET
                    SSCScName = ?,
                    SSCGPA = ?,
                    SSCPY = ?,
                    HSCClgName = ?,
                    HSCGPA = ?,
                    HSCPY = ?,
                    BScUnName = ?,
                    BScCGPA = ?,
                    BScPY = ?,
                    MScUnName = ?,
                    MScCGPA = ?,
                    MScPY = ?
                    WHERE username = ?";

    $updateStmt = $conn->prepare($updateQuery);

    $updateStmt->bind_param(
        "sssssssssssss",
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
        $MScPY,
        $username
    );

    if ($updateStmt->execute()) {
        return true; // Success
    } else {
        return false; // Failure
    }

    $updateStmt->close();
}
