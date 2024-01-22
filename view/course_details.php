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
    <script src="js/updatemarks_validation.js"></script>
    <script src="js/fetchEnrolledStudents.js"></script>
    <title>Course Details</title>
</head>

<body>
    <?php include 'Header.php'; ?>
    <br> <br>

    <div class="course_details">
        <?php
        include_once '../controller/coursedetails_action.php';
        if (isset($_SESSION['updateMessage'])) {
            echo "<div class = \"message\">";
            echo $_SESSION['updateMessage'];
            // Clear the session variable after echoing (optional)
            unset($_SESSION['updateMessage']);
            echo "</div>";
        }
        ?>
        
        <button class="button1" onclick="fetchEnrolledStudents('<?php echo $courseID; ?>');">View All Students/Relode Students</button>
        <p id="students"></p>
        <?php
        // include_once '../controller/studentcourseEnrollment_action.php';
        include_once '../controller/update_marks_action.php';
        ?>
        <?php
        include_once 'assignment.php';
        ?>
    </div>

    <a href="courses.php">Back to Courses</a>
    <?php include 'logout.php'; ?>
    <?php include 'Fotter.php'; ?>
</body>

</html>