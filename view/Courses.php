<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Courses</title>
</head>

<body>
    <?php include 'Header.php'; ?>
    <div class="courses-container">
        <br><br>
        <div class="course-table">
            <h2>You have these courses in this semester:</h2>
            <table class="content-table">
                <?php
                include_once '../model/coursesDB.php';
                if (!empty($courses)) {
                    echo "<tr><th>Course ID</th><th>Course Name</th><th>Section</th><th>Course Code</th><th>Department</th></tr>";
                    foreach ($courses as $course) {
                        echo "<tr>
                        <td><a href=\"course_details.php?course_id={$course['id']}\">{$course['id']}</a></td>
                        <td><a href=\"course_details.php?course_id={$course['id']}\">{$course['name']}</a></td>
                        <td>{$course['section']}</td><td>{$course['code']}</td><td>{$course['department']}</td>
                        </tr>";
                    }
                } else {
                    echo "No courses found.";
                }
                echo "</table>";
                ?>
        </div>
    </div>
    <br> <br>
    <?php include 'logout.php'; ?>
    <?php include 'fotter.php'; ?>
</body>

</html>