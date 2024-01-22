<?php
ob_start();
include_once '../model/updateResetDropDB.php';
if (isset($_POST['update'])) {
    $studentIDToUpdate = $_POST['update'];
    $midtermMarks = $_POST['midterm_marks'][$studentIDToUpdate];
    $finaltermMarks = $_POST['finalterm_marks'][$studentIDToUpdate];
    $totalMarks = $_POST['total_marks'][$studentIDToUpdate];
    if (!is_numeric($midtermMarks)) {
        $_SESSION['updateMessage'] = "Marks must be a number!";
    } elseif ($midtermMarks > 100 || $finaltermMarks > 100) {
        $_SESSION['updateMessage'] = "Marks can't be updated, marks can't be more than 100!";
    } else {
        update($studentIDToUpdate, $midtermMarks, $finaltermMarks, $totalMarks, $courseID);
    }
    header("Location: {$_SERVER['PHP_SELF']}?course_id=$courseID");
    exit();
}

if (isset($_POST['reset'])) {
    $studentIDToReset = $_POST['reset'];
    reset_marks($studentIDToReset, $courseID);
    header("Location: {$_SERVER['PHP_SELF']}?course_id=$courseID");
    exit();
}

if (isset($_POST['drop'])) {
    $studentIDToDrop = $_POST['drop'];
    drop_student($studentIDToDrop, $courseID);
    header("Location: {$_SERVER['PHP_SELF']}?course_id=$courseID");
    exit();
}

?>