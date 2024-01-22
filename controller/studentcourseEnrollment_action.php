<?php
ob_start();
if (isset($_GET['course_id'])) {
    include_once '../model/courseEnrollmentStudentDB.php';
    include_once '../model/databaseconnection.php';
    $courseID = $_GET['course_id'];
    $enrolledStudents = getEnrolledStudents($conn, $courseID);
    if (isset($_SESSION['updateMessage'])) {
        echo "<div class = \"message\">";
        echo $_SESSION['updateMessage'];
        // Clear the session variable after echoing (optional)
        unset($_SESSION['updateMessage']);
        echo "</div>";
    }

    if (!empty($enrolledStudents)) {
        echo "<form method='post' action='' onsubmit = \"return validateUpMrk(this)\">";
        echo "<div class = \"enrolled-students\">";
        echo "<h2>Enrolled Students</h2>";
        echo "<span style = \"color: red\" id = \"midterm_marksErr\"></span>";
        echo "<table class = \"content-table\">";
        echo "<tr><th>Student ID</th><th>Student Name</th><th>Email</th><th>Mid marks</th><th>Final marks</th><th>Total marks</th><th>Actions</th></tr>";

        foreach ($enrolledStudents as $student) {
            $studentID = $student["studentID"];
            $studentName = $student["studentName"];
            $email = $student["email"];
            $midterm_marks = $student["midterm_marks"];
            $finalterm_marks = $student["finalterm_marks"];
            $total_marks = $student["total_marks"];
            echo "<tr>";
            echo "<td>$studentID</td>";
            echo "<td>$studentName</td>";
            echo "<td>$email</td>";
            echo "<td>
            <input type='text' class = \"text-field-marks\" name='midterm_marks[$studentID]' value='$midterm_marks'></td>";
            echo "<td><input type='text' class = \"text-field-marks\" name='finalterm_marks[$studentID]' value='$finalterm_marks'> <span id = \"finalterm_marksErr\"></span> </td>";
            echo "<td><input type='text' class = \"text-field-marks\" name='total_marks[$studentID]' value='$total_marks' readonly> <span id = \"total_marksErr\"></span> </td>";
            echo "<td><button type='submit' class=\"update_button\" name='update' value='$studentID'>Update</button>";
            echo " <button type='submit' class=\"reset_button\" name='reset' value='$studentID'>Reset</button>";
            echo " <button type='submit' class=\"drop_button\" name='drop' value='$studentID'>Drop</button></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
    } else {
        echo "No students enrolled in this course.";
    }
    echo "</div>";
} else {
    echo "Course ID not provided.";
}

// echo "faisal";
