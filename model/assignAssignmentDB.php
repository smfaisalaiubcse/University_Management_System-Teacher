<?php

function insertAssignment($courseID, $assignmentTitle, $dueDate, $assignmentMarks)
{
    global $conn;

    // Use prepared statement to prevent SQL injection
    $insertAssignmentQuery = "INSERT INTO assignments (course_id, assignment_title, due_date, assignment_marks)
                              VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insertAssignmentQuery);
    $stmt->bind_param("ssss", $courseID, $assignmentTitle, $dueDate, $assignmentMarks);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function checkAssignmentTitle($courseID, $assignmentTitle)
{
    global $conn;

    // Check if assignment title already exists
    $checkTitleQuery = "SELECT COUNT(*) FROM assignments WHERE course_id = ? AND assignment_title = ?";
    $stmtCheckTitle = $conn->prepare($checkTitleQuery);
    $stmtCheckTitle->bind_param("ss", $courseID, $assignmentTitle);
    $stmtCheckTitle->execute();
    $stmtCheckTitle->bind_result($titleCount);
    $stmtCheckTitle->fetch();
    $stmtCheckTitle->close();

    if($titleCount > 0) return false;
    return true;
}
