<?php
function update($studentIDToUpdate, $midtermMarks, $finaltermMarks, $totalMarks, $courseID)
{
    $checkRowQuery = "SELECT * FROM student_course_marks WHERE student_id = ? AND course_id = ?";
    include 'databaseconnection.php';
    $stmt = $conn->prepare($checkRowQuery);
    $stmt->bind_param("ss", $studentIDToUpdate, $courseID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $updateMarksQuery = "UPDATE student_course_marks SET midterm_marks = ?, finalterm_marks = ?, total_marks = ? WHERE student_id = ? AND course_id = ?";
        $stmt = $conn->prepare($updateMarksQuery);
        $stmt->bind_param("sssss", $midtermMarks, $finaltermMarks, $totalMarks, $studentIDToUpdate, $courseID);

        if ($stmt->execute()) {
            $_SESSION['updateMessage'] = "Marks updated successfully!";
        } else {
            $_SESSION['updateMessage'] = "Error updating marks: " . $stmt->error;
        }
    } else {
        $insertMarksQuery = "INSERT INTO student_course_marks (student_id, course_id, midterm_marks, finalterm_marks, total_marks) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertMarksQuery);
        $stmt->bind_param("sssss", $studentIDToUpdate, $courseID, $midtermMarks, $finaltermMarks, $totalMarks);

        if ($stmt->execute()) {
            $_SESSION['updateMessage'] = "Marks inserted successfully!";
        } else {
            $_SESSION['updateMessage'] = "Error inserting marks: " . $stmt->error;
        }
    }
}


function reset_marks($studentIDToReset, $courseID){
    include 'databaseconnection.php';
    $resetMarksQuery = "DELETE FROM student_course_marks WHERE student_id = ? AND course_id = ?";
    $stmt = $conn->prepare($resetMarksQuery);
    $stmt->bind_param("ss", $studentIDToReset, $courseID);

    if ($stmt->execute()) {
        $_SESSION['updateMessage'] = "Marks reset successfully!";
    } else {
        $_SESSION['updateMessage'] = "Error resetting marks: " . $stmt->error;
    }

    $stmt->close();
}

function drop_student($studentIDToDrop, $courseID) {
    include 'databaseconnection.php';
    $dropEnrollmentQuery = "DELETE FROM student_course_enrollments WHERE student_id = ? AND course_id = ?";
    $stmtDropEnrollment = $conn->prepare($dropEnrollmentQuery);
    $stmtDropEnrollment->bind_param("ss", $studentIDToDrop, $courseID);

    if ($stmtDropEnrollment->execute()) {
        // If the enrollment is successfully dropped, also remove their marks from the student_course_marks table
        $dropMarksQuery = "DELETE FROM student_course_marks WHERE student_id = ? AND course_id = ?";
        $stmtDropMarks = $conn->prepare($dropMarksQuery);
        $stmtDropMarks->bind_param("ss", $studentIDToDrop, $courseID);

        if ($stmtDropMarks->execute()) {
            $_SESSION['updateMessage'] = "Student dropped and marks removed successfully!";
        } else {
            $_SESSION['updateMessage'] = "Error removing marks: " . $stmtDropMarks->error;
        }

        $stmtDropMarks->close();
    } else {
        $_SESSION['updateMessage'] = "Error dropping student: " . $stmtDropEnrollment->error;
    }

    $stmtDropEnrollment->close();
}

?>
