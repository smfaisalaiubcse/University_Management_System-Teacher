<?php
function getEnrolledStudents($conn, $courseID)
{
    $students = array();

    $student_query = "SELECT s.student_id, s.student_name, s.email FROM students s
        INNER JOIN student_course_enrollments e ON s.student_id = e.student_id
        WHERE e.course_id = '$courseID'";
    $student_result = $conn->query($student_query);

    if ($student_result->num_rows > 0) {
        while ($student_row = $student_result->fetch_assoc()) {
            $studentID = $student_row["student_id"];
            $studentName = $student_row["student_name"];
            $email = $student_row["email"];

            $marks_query = "SELECT midterm_marks, finalterm_marks, total_marks FROM student_course_marks WHERE student_id = '$studentID' AND course_id = '$courseID'";
            $marks_result = $conn->query($marks_query);
            $marks_row = $marks_result->fetch_assoc();

            $midterm_marks = isset($marks_row["midterm_marks"]) ? $marks_row["midterm_marks"] : "-";
            $finalterm_marks = isset($marks_row["finalterm_marks"]) ? $marks_row["finalterm_marks"] : "-";
            $total_marks = isset($marks_row["total_marks"]) ? $marks_row["total_marks"] : "-";

            $students[] = array(
                "studentID" => $studentID,
                "studentName" => $studentName,
                "email" => $email,
                "midterm_marks" => $midterm_marks,
                "finalterm_marks" => $finalterm_marks,
                "total_marks" => $total_marks
            );
        }
    }
    return $students;
}

?>
