<?php
if (isset($_GET['course_id'])) {
    $courseID = $_GET['course_id'];
    include_once '../model/coursedetailsDB.php';
    include_once '../model/databaseconnection.php';
    $courseDetails = courseDetail($conn, $courseID);
    if (!empty($courseDetails)) {
        $courseName = $courseDetails["courseName"];
        $courseCode = $courseDetails["courseCode"];
        $department = $courseDetails["department"];
        echo "<div class=\"course-detail\">";
        echo "<h1>Course Details</h1>";
        echo "<p><b>Course ID:</b> $courseID</p>";
        echo "<p><b>Course Name:</b> $courseName</p>";
        echo "<p><b>Course Code:</b> $courseCode</p>";
        echo "<p><b>Department:</b> $department</p>";
        echo "</div>";
    } else {
        echo "Course not found.";
    }
} else {
    echo "Course ID not provided.";
}
?>
