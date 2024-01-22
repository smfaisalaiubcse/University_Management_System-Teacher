<?php

function displayAssignedAssignments($courseID, $conn)
{
    // Use prepared statement to prevent SQL injection
    $assignedAssignmentsQuery = "SELECT * FROM assignments WHERE course_id = ?";
    $stmt = $conn->prepare($assignedAssignmentsQuery);
    $stmt->bind_param("s", $courseID);
    $stmt->execute();
    $assignedAssignmentsResult = $stmt->get_result();

    // Check if there are assigned assignments
    if ($assignedAssignmentsResult->num_rows > 0) {
        $output = "<table class='content-table'>";
        $output .= "<thead><tr><th>Assignment Title</th><th>Due Date</th><th>Assignment Marks</th></tr></thead>";
        $output .= "<tbody>";

        while ($assignment_row = $assignedAssignmentsResult->fetch_assoc()) {
            $assignmentTitle = $assignment_row['assignment_title'];
            $dueDate = $assignment_row['due_date'];
            $assignmentMarks = $assignment_row['assignment_marks'];

            $output .= "<tr>";
            $output .= "<td>$assignmentTitle</td>";
            $output .= "<td>$dueDate</td>";
            $output .= "<td>$assignmentMarks</td>";
            $output .= "</tr>";
        }

        $output .= "</tbody>";
        $output .= "</table>";
    } else {
        $output = "No assigned assignments for this course.";
    }

    $stmt->close();

    return $output;
}

// Example usage in another file:
// include_once 'path_to_your_function_file.php';
// $html = displayAssignedAssignments($courseID, $conn);
// echo $html;
?>
