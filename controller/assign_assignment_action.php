<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../model/databaseconnection.php';
    if (isset($_POST["std"])) {
        $data = $_POST["std"];
        $data = json_decode($data);
        $assignmentTitle = $data->assignment_title;
        $assignmentMarks = $data->assignment_marks;
        $dueDate = $data->due_date;
        // $courseId = $data->course_id;

        // if ($flag) {
        include '../model/assignAssignmentDB.php';
        if (checkAssignmentTitle($data->course_id, $assignmentTitle)) {
            $status = insertAssignment($data->course_id, $assignmentTitle, $dueDate, $assignmentMarks);
            if ($status) {
                echo 'Success';
                // echo 'course id: ' . $data->course_id;
                $_SESSION['updateMessage'] = "Assignment assigned successfully.";
                $_SESSION['msgAss'] = "Assignment assigned successfully.";
                unset($_SESSION['assignmentTitle']);
                unset($_SESSION['dueDate']);
                unset($_SESSION['assignmentMarks']);
                unset($_SESSION['msgAss']);
                // header("Location: ../view/course_details.php?course_id=$courseID");
                exit();
            } else {
                echo 'Failed';
                $_SESSION['msgAss'] = "Error assigning assignment: " . $stmt->error;
                // header("Location: ../view/course_details.php?course_id=$courseID");
                exit();
            }
            // if (insertAssignment($courseID, $assignmentTitle, $dueDate, $assignmentMarks)) {
            //     $_SESSION['updateMessage'] = "Assignment assigned successfully.";
            //     $_SESSION['msgAss'] = "Assignment assigned successfully.";
            //     unset($_SESSION['assignmentTitle']);
            //     unset($_SESSION['dueDate']);
            //     unset($_SESSION['assignmentMarks']);
            //     unset($_SESSION['msgAss']);
            // } else {
            //     $_SESSION['msgAss'] = "Error assigning assignment: " . $stmt->error;
            // }
        } else {
            $_SESSION['updateMessage'] = "Error assigning assignment";
            $_SESSION['msgAss'] = "Assignment title already exists. Please choose a different title.";
            header("Location: ../view/course_details.php?course_id=$courseID");
            // exit();
        }
        // } else {
        //     header("Location: ../view/course_details.php?course_id=$courseID");
        // }
    }
    $flag = true;
    $courseID = $_POST['course_id'];
    $assignmentTitle = $_POST['assignment_title'];
    $dueDate = $_POST['due_date'];
    $assignmentMarks = $_POST['assignment_marks'];
    $_SESSION['assignmentTitle'] = $assignmentTitle;
    $_SESSION['dueDate'] = $dueDate;
    $_SESSION['assignmentMarks'] = $assignmentMarks;
    if (empty($assignmentTitle) || empty($dueDate) || empty($assignmentMarks)) {
        $_SESSION['updateMessage'] = "Error assigning assignment";
        $_SESSION['msgAss'] = "All fields are required.";
        $flag = false;
        // header("Location: ../view/course_details.php?course_id=$courseID");
        // exit();
    }

    // Additional validation: Check if assignment marks is a valid number
    else if (!is_numeric($assignmentMarks) || $assignmentMarks < 0) {
        $_SESSION['updateMessage'] = "Error assigning assignment";
        $_SESSION['msgAss'] = "Invalid assignment marks. Marks cannot be negative, Please enter a valid number.";
        $flag = false;
        // header("Location: ../view/course_details.php?course_id=$courseID");
        // exit();
    }

    
} else {
    header("Location: ../view/course_details.php");
    exit();
}
