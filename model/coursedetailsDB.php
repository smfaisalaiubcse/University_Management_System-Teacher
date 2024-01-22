<?php
function courseDetail($conn, $courseID)
{
    $course_query = "SELECT course_id, course_name, course_code, department FROM courses WHERE course_id = '$courseID'";
    $course_result = $conn->query($course_query);
    if ($course_result->num_rows > 0) {
        $course_row = $course_result->fetch_assoc();
        $courseName = $course_row["course_name"];
        $courseCode = $course_row["course_code"];
        $department = $course_row["department"];
        return array(
            "courseName" => $courseName,
            "courseCode" => $courseCode,
            "department" => $department
        );
    } else {
        echo "Course not found.";
        return array();
    }
}
?>
